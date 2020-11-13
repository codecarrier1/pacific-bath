<?php

namespace Tests\Feature\Http\Controllers;

use App\Lead;
use App\Option;
use App\Product;
use App\ProductCategory;
use App\Quote;
use App\QuoteItem;
use App\User;
use Facades\App\Tools\TestingData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;

class QuoteControllerTest extends TestCase
{
    use RefreshDatabase, WithoutEvents;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(\RoleAndPermissionSeeder::class);
        $this->seed(\ProductCategorySeeder::class);
        $this->seed(\ColorSeeder::class);
        $this->user = factory(User::class)->state('salesRep')->create();
        $this->lead = factory(Lead::class)->create(['user_id' => $this->user->id]);
    }

    /** @test */
    public function it_adds_an_item_to_an_existing_quote()
    {

        $productQty = random_int(1, 5);
        $products = factory(Product::class, $productQty)->create(['product_category_id' => ProductCategory::inRandomOrder()->first()->id]);
        $quote = Quote::create(['lead_id' => $this->lead->id, 'user_id' => $this->user->id]);
        $randomQty = random_int(1, 4);
        $productData = [];
        foreach($products as $product){
            $productData[] = [
              'quantity' => $randomQty,
              'product_id' => $product->id,
            ];
        }
        $data = [
            'quote_id' => $quote->id,
            'product_category_id' => $product->product_category_id,
            'products' => $productData,
            ];

        // post that data to the endpoint
        $response = $this->actingAs($this->user)->put(route('quote.update'), $data);
        // make sure its a 200 response
        $response->assertOk();
        // Make sure the response returned the number of items created/updated
        $response->assertExactJson([count($products)]);
        // Make sure the quote now has correct number of items
        $this->assertEquals(count($products), $quote->items()->count());
        // Make sure the item data matches the product data

        $product = $products->random();
        $item = $quote->items()->where('product_id', $product->id)->firstOrFail();
        $this->assertEquals($product->price, $item->price);
        $this->assertEquals($randomQty, $item->quantity);
        $this->assertEquals($product->id, $item->product_id);
        $this->assertEquals($product->sku, $item->sku);
        $this->assertJson($product->options->toJson(), json_encode($item->options));
    }

    /** @test */
    public function it_removes_all_items_from_the_quote_for_the_specified_category_if_the_array_is_empty()
    {
        $category = ProductCategory::inRandomOrder()->first();
        $product = factory(Product::class)->create(['product_category_id' => $category->id]);
        $quoteItem = factory(QuoteItem::class)->create(['product_category_id' => $category->id, 'product_id' => $product->id, 'options' => []]);
        $quote = $quoteItem->quote;
        $data = [
            'quote_id' => $quote->id,
            'product_category_id' => $quoteItem->product->product_category_id,
            'products' => [],
        ];
        // Verify there is only one quote item before the request
        $this->assertEquals(1, $quote->items->count());

        // post that data to the endpoint
        $response = $this->actingAs($this->user)->put(route('quote.update'), $data);

        // make sure its a 200 response
        $response->assertOk();

        // update our quote from the database
        $quote->refresh();

        // Verify there are now no quote items after the request
        $this->assertEquals(0, $quote->items->count());




    }
}
