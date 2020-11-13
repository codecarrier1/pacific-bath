<?php

use App\ProductInformation;
use App\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

/**
 * Class ProductInformationSeeder
 */
class ProductInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $showers = $bathTubs = collect([
            ProductInformation::TYPE_OVERVIEW => collect([
                'Demo and remove the old unit',
                'Check the walls and floor for possible rot and damage',
                'Provide plumbing connections',
                'Install your new Kohler Walk-In Shower with the Kohler LuxStone walls and accessories',
                'Easy to use Kohler fixtures ',
                'Clean up and dispose of the existing tub and materials',
            ]),
            ProductInformation::TYPE_SAFETY => collect([
                'Low threshold shower base',
                'Grab bars (optional)',
                'Slip resistant surface',
            ]),
            ProductInformation::TYPE_WARRANTY => collect([
                'Kohler Walk-In Shower LuxStone walls are compression molded made of crushed stone',
                '30 years of Kohler compression technology',
                '140 Years of Kohler in your corner',
                '3 year labor and installation warranty',
                'Installed by certified Kohler installers',
                'Limited Lifetime Kohler warranty',
                'The Kohler Walk-In Showers are made in America (Kohler Wisconsin USA)',
            ]),
        ]);

        $walkIns = collect([
            ProductInformation::TYPE_OVERVIEW => collect([
                'Demo and remove the old unit',
                'Check the walls and floor for possible rot and damage',
                'Provide plumbing connections',
                'Check, install, permit and inspect electrical circuits (if needed) and outlets for Hydrotherapy jets, back and neck heating',
                'Install your new Kohler Walk-In Bath with 17 bubble ports customizable with 3 settings, 10 adjustable hydrotherapy jets for both intensity and direction (2 behind the calves and 2 in front, 6 perfectly targeted jets for back and spine therapy)',
                'Easy to use and accessible fixtures',
                'Hydrotherapy controls located at the ideal position both functionally and aesthetically',
                'Customizable 3-setting heated back and neck functionality for comfort while bath is filling/draining',
                'Clean up and dispose of the existing tub and materials',
            ]),
            ProductInformation::TYPE_SAFETY => collect([
                '3" step-in-height (lowest in the industry)',
                'Internal and external integrated handrails',
                'Extra-wide opening air-tight door',
                'Slip resistant surface',
                '21 1/2 wide seat (slanted back for comfort with drop forward groove for ideal draining)',
            ]),
            ProductInformation::TYPE_WARRANTY => collect([
                'Kohler Walk-In Bath is filled, ran/seal tested in the factory before shipping to ensure it\'s ready to use',
                '3 year labor and installation warranty',
                'Installed by certified Kohler installers',
                'Limited Lifetime Kohler warranty',
                'The Kohler Walk-In Bath is made in America',
            ]),
        ]);

        $data = collect([
            Service::SHOWERS => $showers,
            Service::BATHTUBS => $bathTubs,
            Service::WALK_INS => $walkIns,
        ]);

        // Loop and build our data
        $data->each(function (Collection $productInformation, int $serviceId) {
            $productInformation->each(function (Collection $data, string $productType) use ($serviceId) {
                $data->each(function (string $data) use ($productType, $serviceId) {
                    ProductInformation::create([
                        'service_id' => $serviceId,
                        'type' => $productType,
                        'content' => $data,
                    ]);
                });
            });
        });
    }
}
