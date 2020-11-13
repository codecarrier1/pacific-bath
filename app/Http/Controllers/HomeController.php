<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        if (auth()->user()->can('view_everything')) {
            return redirect()->route('dashboard.admin');
        }

        return redirect()->route('dashboard.mine');
    }
}
