<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // form validation
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
        ]);

        // log user in
        if(!auth()->attempt($request->only('username', 'password'), $request->remember)) {
            return back()->with(['status' => 'Your credentials were invalid']);
        };

        // redirect the user the the dashboard
        return redirect()->route('dashboard');
    }
}
