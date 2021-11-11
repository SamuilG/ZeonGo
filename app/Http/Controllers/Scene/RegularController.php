<?php

namespace App\Http\Controllers\Scene;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RegularController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        // $key = "https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=".$this->createKey();
        $key = "https://api.qrserver.com/v1/create-qr-code/?size=500x500&data=fuck_u";
        return view('scenes.regular')->with('key', $key);
    }

    private function createKey()
    {
        return Str::random(500);
    }
}
