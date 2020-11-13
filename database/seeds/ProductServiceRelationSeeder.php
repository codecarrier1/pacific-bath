<?php

use Illuminate\Database\Seeder;

class ProductServiceRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\App\ProductCategory::SERVICES as $serviceId => $categories){
            $order = 1;
            $service = \App\Service::find($serviceId);
            foreach($categories as $category){
                $service->productCategories()->attach($category, ['order_column' => $order]);
                $order++;
            }
        }
    }
}
