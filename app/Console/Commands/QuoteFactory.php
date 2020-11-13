<?php

namespace App\Console\Commands;

use App\Lead;
use App\Product;
use App\ProductCategory;
use App\Quote;
use App\QuoteItem;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

/**
 * Class QuoteFactory
 *
 * @package App\Console\Commands
 */
class QuoteFactory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:factory {lead} {--d|delete} {--l|withoutLineItems} {--lc|lineItemCount=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a quote with optional items for a lead.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $lead = Lead::with(['quote', 'quote.items'])->find($this->argument('lead'));

        $withoutLineItems = $this->option('withoutLineItems');

        $lineItemCount = $this->option('lineItemCount');

        $deleteOnly = $this->option('delete');

        // Clear any prior quotes for this lead as we may only have one per lead
        Schema::disableForeignKeyConstraints();

        $lead->quote->items()->delete();

        $lead->quote->delete();

        Schema::enableForeignKeyConstraints();

        // Handle delete only options
        if ($deleteOnly) {
            $this->info('Quote deleted for lead ID #' . $lead->id);

            return;
        }

        // Create a quote from our factory
        $quote = factory(Quote::class)->create([
            'lead_id' => $lead->id,
            'user_id' => $lead->user_id,
        ]);

        $this->info('#' . $quote->id . ' Quote created with lead ID #' . $lead->id);

        // Halt if we are skipping line items
        if ($withoutLineItems) {
            return;
        }

        // Build a collection of all categories
        $categories = collect(ProductCategory::CONSTANTS);

        // Loop our categories and choose products from each
        $categories->each(function (int $productCategoryId) use ($lineItemCount, $quote, $lead) {
            // Pick random product to add to our quote
            $products = Product::whereProductCategoryId($productCategoryId)
                ->whereHas('category.services', function (Builder $query) use ($lead) {
                    $query->where('service_id', $lead->service_id);
                })
                ->inRandomOrder()
                ->take($lineItemCount)
                ->get();

            // Assign these products to a quote item
            $products->each(function (Product $product) use ($quote) {
                // Make a unsaved model
                $quoteItem = QuoteItem::make(Quote::hydrateQuoteItems($product, $quantity = rand($min = 1, $max = 10)));

                // Assign our quote ID
                $quoteItem->quote_id = $quote->id;

                // Save our model
                $quoteItem->save();
            });

        });
    }
}
