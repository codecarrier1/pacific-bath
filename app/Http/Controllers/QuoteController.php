<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteItemRequest;
use App\Quote;
use App\QuoteItem;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function update(QuoteItemRequest $request)
    {
        return response()->json(Quote::syncItems($request->validated()));
    }
}
