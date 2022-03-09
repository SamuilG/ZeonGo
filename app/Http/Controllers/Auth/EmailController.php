<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
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

    public function resetPassword(Request $request){
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        $user = User::find(auth()->id());
        $user->password = bcrypt($request->password);
        $user->save();

        redirect()->route('home');
    }

    public function forgottenPasswordRedirect(Request $request){
        return view("auth.resetPassword");
    }

    public function forgottenPassword(Request $request){
        $request = $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request['email'];
        $passwordToken = Str::random(50);
        
        // add a check in db for email
        // DB::insert('insert into password_resets (email, token) values (?, ?)', [$email, $passwordToken]);

        $data = array('email' => $email, 'token' => $passwordToken);
        Mail::send('emails.forgottenPasswordLink', ["data" => $data], function($m) use($data){ // change blade
            $m->to($data['email'])->subject('Forgotten password');
            $m->from("admin@beta.zeongo.online", "ZeonGo");
        });

        return redirect()->route('login')->with('status', 'Check your email');
    }
}
