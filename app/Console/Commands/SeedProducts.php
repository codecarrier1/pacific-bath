<?php

namespace App\Console\Commands;

use App\ProductCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SeedProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds products using the job queue.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $categories = ProductCategory::all();
        foreach ($categories as $category) {
            $slug = Str::slug($category->name);
            $csv = database_path('seeds/csv/' . $slug . '.csv');
            if(! file_exists($csv)){
                dump('csv doesnt exist for ' . $csv);
                die;
            }
            $importer = new \App\Tools\ProductImporter;
            $importer
                ->setCsv($csv)
                ->setCategory($category->id)
                ->createProducts();
            $this->info("Dispatched " . $category->name);
        }
    }
}
