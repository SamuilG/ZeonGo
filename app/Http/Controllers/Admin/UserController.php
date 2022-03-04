<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(16);

        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $user = new User();

        return view('admin.users.form', compact('user'));
    }

    public function edit()
    {
        # code...
    }
}
