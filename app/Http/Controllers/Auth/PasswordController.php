<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    // no need for  __construct() because this will be used for both guest and auth

    public function forgottenPassword(Request $request)
    {
        // $jsonRequest = $request->json()->all();
        // $this->validate($jsonRequest, [
        //     'email' => 'required|email',
        // ]);

        // $email = $jsonRequest->email;
        // $passwordToken = Str::random(50);
        // add a check in db for email
        // DB::insert('insert into password_resets (email, token) values (?, ?)', [$email, $passwordToken]);

        // $data = array('email' => $email, 'token' => $passwordToken);
        // Mail::send('auth.emailVerify', ["data" => $data], function($m) use($data){ // change blade
        //     $m->to($data['email'], $data['name'])->subject('Forgotten password');
        //     $m->from("admin@beta.zeongo.online", "ZeonGo");
        // });

        // return redirect()->route('login')->with('status', 'HERE!!!');
        return 'gsfgd';
    }
}
