<?php

namespace App\Http\Controllers;

use App\HomeownersContact;
use App\Http\Requests\StoreHomeownersContactRequest;
use App\Lead;

/**
 * Class HomeownersContactController
 *
 * @package App\Http\Controllers
 */
class HomeownersContactController extends Controller
{
    /**
     * @param  \App\Http\Requests\StoreHomeownersContactRequest  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreHomeownersContactRequest $request, Lead $lead)
    {
        // Create a new Homeowners contact model
        $homeownersContact = new HomeownersContact();

        // Fill with our validated data
        $homeownersContact->fill($request->all());

        // Force our lead ID
        $homeownersContact->lead_id = $lead->id;

        // Save
        $homeownersContact->save();

        // Let our frontend know it worked
        return response()->json();
    }
}
