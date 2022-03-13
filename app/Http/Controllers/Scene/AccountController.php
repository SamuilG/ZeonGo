<?php

namespace App\Http\Controllers\Scene;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function changeEmail(Request $request)
    {
        $request = $request->validate([
            'email' => 'required|email|unique:users,email'
        ]);

        $user = auth()->user();
        $user->email = $request['email'];
        $user->save();

        session()->flash('success', 'Email successfuly updated.');
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = auth()->user();

        if(!Hash::check($request['old_password'], $user->password)){
            session()->flash('error', 'Old password is not correct');
            return redirect()->back();
        }

        $user->password = $request['password'];
        $user->save();

        session()->flash('success', 'Password updated successfuly.');
        return redirect()->back();
    }

    public function changeName(Request $request)
    {
        $request = $request->validate([
            'name' => 'required'
        ]);

        $user = auth()->user();
        $user->name = $request['name'];
        $user->save();

        session()->flash('success', 'Name successfuly updated.');
        return redirect()->back();
    }

    public function deleteAccount()
    {
        $user = auth()->user();

        User::destroy($user->id);

        return redirect()->route('login');
    }
}
