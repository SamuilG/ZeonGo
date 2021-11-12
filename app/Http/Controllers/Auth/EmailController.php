<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function verifyEmail(Request $request)
    {
        //dd($request->key);
        $key = $request->key;
        
        DB::update('UPDATE `users` SET `email_verified`= 1 WHERE `email_verified` = ?', [$key]);

        redirect()->route('login');
    }
}
