<?php

namespace App\Http\Controllers;

use App\Measurement;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMeasurementsRequest;

class UpdateMeasurementsController extends Controller
{
    public function update(UpdateMeasurementsRequest $request, Measurement $measurement)
    {
        $measurement->update($request->validated());

        return response()->json($measurement);
    }
}
