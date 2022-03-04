<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\History;
use App\Models\Manager;
use App\Models\Pass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }

    public function index(Request $request)
    {
        $users = User::all();
        $devices = Device::all();
        $history = History::all();
        $passes = Pass::all();

        if($request->user_search){
            $users = $users->where('email', $request->user_search);
        }
        if($request->device_search){
            $devices = $devices->where('device_name', $request->device_search);
        }
        return view('admin.index', compact('users', 'devices', 'history', 'passes'));
    }
    public function createDeviceIndex()
    {
        return view('admin.createDevice');
    }
    public function accountAdminSide(User $user)
    {
        return view('admin.accountAdminSide', compact('user'));
    }
    public function updateUser(Request $request, User $user)
    {
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $request = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return redirect()->back();
    }
    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.index');
    }
    public function removePass(Device $device, User $user)
    {
        Pass::where('user_id', $user->id)->where('device_id', $device->id)->delete();

        return redirect()->route('admin.accountAdminSide', $user->uuid);
    }

    public function saveDevice(Request $request)
    {
        $manager = User::where('email', $request->manager_email)->get()->first();
        if(!$manager){
            return redirect()->back();
        }
        $request = $request->validate([
            'device_name' => 'required',
            'device_description' => 'required',
            'coordinates' => 'required',
        ]);

        $device = Device::create([
            'uuid' => Device::createUUID(),
            'device_key' => Device::createKey(),
            'device_name' => $request['device_name'],
            'device_description' => $request['device_description'],
            'coordinates' => $request['coordinates']
        ]);
        
        Manager::create([
            'user_id' => $manager->id,
            'device_id' => $device->id
        ]);

        return redirect()->route('admin.index');
    }
}
