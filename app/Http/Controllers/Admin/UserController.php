<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserKey;
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
    
    public function store(Request $request)
    {
        $request = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required'
        ]);

        User::create($request + ['email_verified' => '1'] + ['uuid' => User::createUUID()]);

        UserKey::create([
            'user_id' => auth()->id(),
            'user_key' => '0'
        ]);

        session()->flash('success', 'User succesfully created');

        return redirect('/admin/users');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
        ]);

        $user->update($request);
        $user->save();

        session()->flash('success', 'User succesfully updated');

        return redirect('/admin/users');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        session()->flash('success', 'User succesfully deleted');

        return redirect('/admin/users');
    }
}
