<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Actions\ImportLeadFromSalesForce;

class LeadController extends Controller
{

    public function store()
    {

        $rawXml = request()->getContent();

        $response = (new ImportLeadFromSalesForce)->handle($rawXml);

        return response()->xml($response);

    }



}
