<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
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
            'remember_token' => $emailVKey,
        ]);

        $data = array('email' => $request->email, 'name' =>  $request->name, 'verifyKey' => $emailVKey);
        Mail::send('auth.emailVerify', ["data" => $data], function($m) use($data){
            $m->to($data['email'], $data['name'])->subject('A');
            $m->from("ZeonGo@online.com", "ZeonGo");
        });

        auth()->attempt($request->only('email', 'password'));

        DB::insert('insert into user_keys (user_id, user_key) values (?, ?)', [auth()->id(), '0']);

        return redirect()->route('home');
    }
}
