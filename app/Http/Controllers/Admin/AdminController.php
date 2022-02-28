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
        $users = User::all();

        $device = Device::all();

        $data = array('users' => $users, 'device' => $device);

        return view('admin.admin')->with('data', $data)
    }
}
