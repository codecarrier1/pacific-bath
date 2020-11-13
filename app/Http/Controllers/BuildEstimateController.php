<?php

namespace App\Http\Controllers;

use App\Lead;
use App\ProductCategory;
use App\Service;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BuildEstimateController extends Controller
{

    public function show(Lead $lead, int $step)
    {
        $service = $lead->service;
        $productCategories = $lead->service->productCategories()->withPivot('order_column')->get();
        $index = $step - 1;
        $currentCategory = $productCategories[$index];
        $viewName = Str::slug($currentCategory->name);
        $className = ProductCategory::SUB_MODELS[$currentCategory->id];
        $subModels = call_user_func($className . "::all");
        $initialData = call_user_func($className . '::getResponseData', $subModels);
        $lastStep = $productCategories->count();
        $nextStep = $step + 1;
        if($nextStep > $lastStep){
            $nextText = "Roll Sheet";
            $nextLink = route('roll.sheet.summary', [$lead]);
        } else {
            $nextText = $productCategories[$nextStep - 1]->name;
            $nextLink = route('build-estimate', ['lead' => $lead, 'step' => $nextStep]);
        }
        $prevStep = $step - 1;
        if(!$prevStep && $lead->service_id === Service::WALK_INS){
            $prevText = 'Job Specifications';
            $prevLink = route('job-specifications', [$lead]);
        } else if (!$prevStep){
            $prevText = 'Base Measurements';
            $prevLink = route('measurements.calculate', [$lead]);
        }
        else {
            $prevText = $productCategories[$prevStep - 1]->name;
            $prevLink = route('build-estimate', ['lead' => $lead, 'step' => $prevStep]);
        }
        $services = Service::all();

        return view('build-estimate.' . $viewName)
            ->with('lead', $lead)
            ->with('service', $service)
            ->with('services', $services)
            ->with('currentCategory', $currentCategory)
            ->with('productCategories', $productCategories)
            ->with('currentStep', $step)
            ->with('nextTextOverride', $nextText)
            ->with('nextLinkOverride', $nextLink)
            ->with('prevTextOverride', $prevText)
            ->with('prevLinkOverride', $prevLink)
            ->with('initialData', $initialData);
    }

    public function changeService(Lead $lead, int $service_id, int $step = 1)
    {
        $lead->service_id = $service_id; // Change service ID
        $lead->quote->items()->delete(); // Remove previous quotes
        $lead->save();
        return redirect()->route('build-estimate', ['lead' => $lead->id, 'step' => 1]);
    }

}
