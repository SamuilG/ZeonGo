<?php

namespace App\Http\Controllers\Scene;

use App\Models\UserKey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class RegularController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        if(auth()->user()->email_verified != 1){
            auth()->logout();
            return redirect()->route('login')->with('status', 'Please verify your email');
        }
        $key = "https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data=".$this->createKey();
        return view('scenes.regular')->with('key', $key);
        
    }

    private function createKey()
    {
        $key = Str::random(100);
        // DB::update('UPDATE `user_keys` SET `user_key`= ? WHERE user_id = ?', [$key, auth()->id()]);
        // $row = UserKey::where('user_id', auth()->id());
        // $row->user_key = $key;
        // $row->save();
        UserKey::where('user_id', auth()->id())->update(array('user_key' => $key));
        return $key;
    }
}
