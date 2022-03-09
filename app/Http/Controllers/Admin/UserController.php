<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\History;
use App\Models\Manager;
use App\Models\Pass;
use App\Models\User;
use App\Models\UserKey;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'ASC');

        if($request->search_id){
            $users = $users->where('id', $request->search_id);
        }

        if($request->search_name){
            $users = $users->where('name', 'LIKE',  '%'.$request->search_name.'%');
        }

        if($request->search_email){
            $users = $users->where('email', 'LIKE',  '%'.$request->search_email.'%');
        }

        if($request->email_verified){
            if($request->email_verified == 'yes'){
                $users = $users->where('email_verified', '1');
            } else {
                $users = $users->where('email_verified', '!=', '1');
            }
        }

        if($request->search_registered_on){
            $users = $users->whereDate('created_at', $request->search_registered_on);
        }
        $users = $users->paginate(15);

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

        // $request['password'] = bcrypt($request['password']);

        $user = User::create($request + ['email_verified' => '1'] + ['uuid' => User::createUUID()]);

        UserKey::create([
            'user_id' => $user->id,
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
            // 'email' => 'required|email',
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

    public function createPass(User $user)
    {
        return view('admin.passes.userform', compact('user'));
    }

    public function storePass(User $user, Request $request)
    {
        $request = $request->validate([
            'device_key' => 'required|exists:devices,device_key'
        ]);

        $device = Device::where('device_key', $request['device_key'])->get()->first();
        $pass = Pass::where('device_id', $device->id)->where('user_id', $user->id)->get()->first();

        if($pass) {
            session()->flash('info', 'User already has access to this device');
            return redirect()->back();
        }

        Pass::create([
            'device_id' => $device->id,
            'user_id' => $user->id,
            'approved' => true
        ]);

        session()->flash('success', $user->name.' now has access to '.$device->device_name);
        return redirect('/admin/users/edit/'.$user->uuid);
    }

    public function destroyPass(User $user, Device $device)
    {
        $pass = Pass::where('device_id', $device->id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        Pass::destroy($pass->id);

        session()->flash('success', 'Pass successfuly removed from user');

        return redirect('/admin/users/edit/'.$user->uuid);

    }

    public function createManager(User $user)
    {
        return view('admin.managers.userform', compact('user'));
    }

    public function storeManager(User $user, Request $request)
    {
        $request = $request->validate([
            'device_key' => 'required|exists:devices,device_key'
        ]);

        $device = Device::where('device_key', $request['device_key'])->get()->first();
        $manager = Manager::where('device_id', $device->id)->where('user_id', $user->id)->get()->first();

        if($manager) {
            session()->flash('info', 'User is already managing this device');
            return redirect()->back();
        }

        Manager::create([
            'device_id' => $device->id,
            'user_id' => $user->id,
        ]);

        $pass = Pass::where('device_id', $device->id)->where('user_id', $user->id)->get()->first();

        if($pass) {
            session()->flash('info', 'User already has access to this device');
            return redirect()->back();
        }

        Pass::create([
            'device_id' => $device->id,
            'user_id' => $user->id,
            'approved' => true
        ]);

        session()->flash('success', $user->name.' is now managing '.$device->device_name);
        return redirect('/admin/users/edit/'.$user->uuid);
    }

    public function destroyManager(User $user, Device $device)
    {
        // dd($user);
        $pass = Manager::where('device_id', $device->id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        Manager::destroy($pass->id);

        session()->flash('success', $user->name.' is no longer managing '.$device->device_name);

        return redirect('/admin/users/edit/'.$user->uuid);

    }

    public function destroyHistory(User $user, History $history)
    {
        History::destroy($history->id);

        session()->flash('success', 'History log successfuly deleted.');

        return redirect('/admin/users/edit/'.$user->uuid);
    }
}
