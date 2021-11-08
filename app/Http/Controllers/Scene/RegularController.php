<?php

namespace App\Http\Controllers\Scene;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegularController extends Controller
{
    public function index(){
        return view('scenes.regular');
    }
}
