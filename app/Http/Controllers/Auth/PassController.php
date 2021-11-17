<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PassController extends Controller
{
    // no need for  __construct() because this will be used for both guest and auth

    
    public function index(){
        return view('auth.login');
    }
    
    public function forgottenPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $email = $request->email;
        $passwordToken = Str::random(50);
        // add a check in db for email
        // DB::insert('insert into password_resets (email, token) values (?, ?)', [$email, $passwordToken]);

        $data = array('email' => $email, 'token' => $passwordToken);
        Mail::send('emails.forgottenPassword', ["data" => $data], function($m) use($data){ // change blade
            $m->to($data['email'])->subject('Forgotten password');
            $m->from("admin@beta.zeongo.online", "ZeonGo");
        });

        return redirect()->route('login')->with('status', 'Check your email');
    }
}