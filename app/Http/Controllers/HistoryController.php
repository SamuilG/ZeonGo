<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $history = auth()->user()->history;
        
        return view('scenes.history')->with('data', $history);
    }
}
