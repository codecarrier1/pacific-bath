<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevLoginController extends Controller
{
    public function store(User $user)
    {
        auth()->login($user);
        session()->put('auth_id', $user->id);
        session()->put('avatar', $user->getAvatar());
        if ($user->can('view_everything')) {
            return redirect()->route('dashboard.admin');
        }

        return redirect()->route('dashboard.mine');
    }
}
