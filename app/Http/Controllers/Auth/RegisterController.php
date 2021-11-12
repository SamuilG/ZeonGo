<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserKey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max: 255',
            'email' => 'required|max: 255|email',
            'password' => 'required|confirmed',
        ]);

        $emailVKey = Str::random(50);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified' => $emailVKey
        ]);

        $data = array('email' => $request->email, 'name' =>  $request->name, 'verifyKey' => $emailVKey);
        Mail::send('emails.emailVerify', ["data" => $data], function($m) use($data){
            $m->to($data['email'], $data['name'])->subject('Email verification');
            $m->from("admin@beta.zeongo.online", "ZeonGo");
        });

        auth()->attempt($request->only('email', 'password'));
        
        // DB::insert('insert into user_keys (user_id, user_key) values (?, ?)', [auth()->id(), '0']);
        UserKey::create([
            'user_id' => auth()->id(),
            'user_key' => '0'
        ]);

        return redirect()->route('login')->with('status', 'Please verify your email');
    }
}
