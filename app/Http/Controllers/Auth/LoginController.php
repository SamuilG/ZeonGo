<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index(){
        return view('auth.login');
    }

    public function store(LoginRequest $request){
        
        if(!auth()->attempt($request->validated(), $request->remember)){
            return back()->with('status', 'Invalid login details');
        }
        // if(auth()->user()->email_verified != 1){
        //     return back()->with('status', 'Email is not verified');
        // }
        return redirect()->route('home');
    }
}
