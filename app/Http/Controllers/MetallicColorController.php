<?php

namespace App\Http\Controllers;

use App\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MetallicColorController extends Controller
{

    public function show(Lead $lead)
    {
        return response()->json((int)$lead->preselected_color_id);
    }

    public function store(Request $request, Lead $lead)
    {

        $lead->preselected_color_id = $request->input('color_id');
        $lead->save();
        return response()->noContent();
    }

}
