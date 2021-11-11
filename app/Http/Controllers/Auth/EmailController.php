<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send()
    {   
        $data = array('email' => 'ilko.petrov27@gmail.com', 'username' =>  'ilko', 'verifyKey' => '123456789');
        Mail::send('auth.emailVerify', $data, function($m) use($data){
            $m->to($data['email'], $data['username'])->subject('A');
            $m->from("ZeonGo@online.com", "ZeonGo");
        });
    }
    public function verifyEmail(Request $request)
    {
        dd($request->key);
    }
}
