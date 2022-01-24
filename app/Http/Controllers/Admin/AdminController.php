<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }
    public function index()
    {
        // if(!auth()->user()->isAdmin()){
        //     return redirect()->route('home');
        // }
        return view('admin.admin');
    }
}
