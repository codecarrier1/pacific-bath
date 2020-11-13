<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateConversionTypeRequest;
use App\Lead;
use Illuminate\Http\Request;

class ConversionTypeController extends Controller
{
    public function update(UpdateConversionTypeRequest $request, Lead $lead)
    {
        return response()->json($lead->update($request->validated()));
    }
}
