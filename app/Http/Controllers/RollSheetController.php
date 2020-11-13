<?php

namespace App\Http\Controllers;

use App\FinancingOption;
use App\Lead;
use App\ProductCategory;
use App\ProductInformation;
use Illuminate\Support\Str;

/**
 * Class RollSheetController
 *
 * @package App\Http\Controllers
 */
class RollSheetController extends Controller
{
    /**
     * @param  \App\Lead  $lead
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function summary(Lead $lead)
    {
        if (empty($lead->quote) || empty($lead->quote->items)) {
          //  abort(404);
        }

        $groupedItems = $lead->quote->items->groupBy('product_category_id') ?? null;

        // Combine bathtub drains and bathtubs into one group
        if($groupedItems->has(ProductCategory::BATHTUB_DRAINS)){
            $bathtubs = $groupedItems->pull(ProductCategory::BATHTUBS);
            $drains = $groupedItems->pull(ProductCategory::BATHTUB_DRAINS);
            $bathtubs = $bathtubs->merge($drains);
            $groupedItems->put(ProductCategory::BATHTUBS, $bathtubs);
        }
        // Combine showerpan drains and showerpans into one group
        if($groupedItems->has(ProductCategory::SHOWER_PAN_DRAINS)){
            $showerPans = $groupedItems->pull(ProductCategory::SHOWER_PANS);
            $drains = $groupedItems->pull(ProductCategory::SHOWER_PAN_DRAINS);
            $showerPans = $showerPans->merge($drains);
            $groupedItems->put(ProductCategory::SHOWER_PANS, $showerPans);
        }

        $sorted = collect();


        $productCategories = $lead->service->productCategories()->withPivot('order_column')->get();

        $stepMap = [];
        foreach ($productCategories as $key => $productCategory){
            $stepMap[$productCategory->id] = $key + 1;
            if($groupedItems->has($productCategory->id)){
                $sorted->push($groupedItems->pull($productCategory->id));
            }
        }



        return view('roll-sheet.order-summary', [
            'lead' => $lead,
            'groupedItems' => $sorted,
            'stepMap' => $stepMap,
        ]);
    }

    public function paymentOptions(Lead $lead)
    {
        return view('roll-sheet.payment-options-details')
            ->with('lead', $lead)
            ->with('financingOptions', FinancingOption::all());
    }


    /**
     * @param Lead $lead
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productInformation(Lead $lead)
    {
        $productInfos = ProductInformation::all()->groupBy('type');
        $productInfoTypes = ProductInformation::getReflectedConstants('TYPE_');
        $formatted = [];
        foreach($productInfoTypes as $type){
            $formatted[Str::upper($type)] = $type;
        }
        $serviceName = Str::singular($lead->service->name);


        return view('roll-sheet.product-information', [
            'lead' => $lead,
            'productInfos' => $productInfos,
            'productInfoTypes' => json_encode($formatted),
            'serviceName' => $serviceName,
        ]);
    }
}
