<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePropertyTypeRequest;
use App\Lead;

class PropertyTypeController extends Controller
{
    public function update(UpdatePropertyTypeRequest $request, Lead $lead)
    {
        return response()->json($lead->update($request->validated()));
    }
}
