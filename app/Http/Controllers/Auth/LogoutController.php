<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        if(auth()->user()) {
            auth()->logout();
            return redirect()->route('home');
        }
    }
}
