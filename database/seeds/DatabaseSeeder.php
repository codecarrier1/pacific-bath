<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(LocationSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(RealUserSeeder::class);
        $this->call(AuthTokensTableSeeder::class);

        if (app()->environment('local')) {
            $this->call(FakeUserSeeder::class);
        }
        $this->call(SalesDispositionSeeder::class);
        $this->call(SalesDocumentSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(InstallationStatusSeeder::class);
        $this->call(ProcessorStatusSeeder::class);
        $this->call(DiscoveryQuestionSeeder::class);
        //   $this->call(LeadSeeder::class);
        if (app()->environment('local')) {
            $this->call(LeadSeeder::class);
            $this->call(QuoteSeeder::class);
        }
        $this->call(PaymentsTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductSubCategoriesTableSeeder::class);
        $this->call(ProductServiceRelationSeeder::class);
        $this->call(PropertyTypeSeeder::class);
        $this->call(ConversionTypeSeeder::class);
        $this->call(JsQuestionsTableSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(ProductInformationSeeder::class);
        $this->call(ScopeOfWorkQuestionSeeder::class);
        // $this->call(ProductSeeder::class);
        if(app()->environment('local')){
            $this->call(ProductsTableSeeder::class);
            $this->call(OptionsTableSeeder::class);
            $this->call(ColorsTableSeeder::class);
            $this->call(MediaTableSeeder::class);
        }

        $this->call(AuthTokensTableSeeder::class);
        $this->call(FinancingOptionsTableSeeder::class);

        \Illuminate\Support\Facades\Cache::flush();

    }
}
