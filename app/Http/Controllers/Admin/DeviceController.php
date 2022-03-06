<?php

namespace App\Http\Controllers\Admin;

use App\Models\Device;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Manager;
use App\Models\Pass;
use App\Models\User;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }

    public function index(Request $request)
    {
        $devices = Device::orderBy('id', 'ASC');

        if($request->search_device_key){
            $devices = $devices->where('device_key', $request->search_device_key);
        }

        if($request->search_name){
            $devices = $devices->where('device_name', 'LIKE',  '%'.$request->search_name.'%');
        }

        $devices = $devices->paginate(15);

        return view('admin.devices.index', compact('devices'));
    }
    
    public function create()
    {
        $device = new Device();

        return view('admin.devices.form', compact('device'));
    }

    public function store(Request $request)
    {
        $request = $request->validate([
            'device_name' => 'required',
            'coordinates' => 'required',
            'device_description' => 'required'
        ]);

        Device::create($request + ['uuid' => Device::createUUID(), 'device_key' => Device::createKey()]);

        session()->flash('success', 'Device succesfully created');

        return redirect('/admin/devices');
    }

    public function edit(Device $device)
    {
        return view('admin.devices.form', compact('device'));
    }

    public function update(Request $request, Device $device)
    {
        $request = $request->validate([
            'device_name' => 'required',
            'coordinates' => 'required',
            'device_description' => 'required'
        ]);

        $device->update($request);
        $device->save();

        session()->flash('success', 'Device succesfully updated');

        return redirect('/admin/devices');
    }

    public function destroy(Device $device)
    {
        Device::destroy($device->id);

        session()->flash('success', 'Device succesfully deleted');

        return redirect('/admin/devices');
    }

    public function createPass(Device $device)
    {
        return view('admin.passes.form', compact('device'));
    }

    public function storePass(Device $device, Request $request)
    {
        $request = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request['email'])->get()->first();
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

        session()->flash('success', 'Pass granted to '.$user->name);
        return redirect('/admin/devices/edit/'.$device->uuid);
    }

    public function destroyPass(Device $device, User $user)
    {
        $pass = Pass::where('device_id', $device->id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        Pass::destroy($pass->id);

        session()->flash('success', 'User successfuly removed from this device');

        return redirect('/admin/devices/edit/'.$device->uuid);

    }

    public function createManager(Device $device)
    {
        $users = User::all();
        return view('admin.managers.form', compact('device', 'users'));
    }

    public function storeManager(Device $device, Request $request)
    {
        $request = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request['email'])->get()->first();
        $manager = Manager::where('device_id', $device->id)->where('user_id', $user->id)->get()->first();

        if($manager) {
            session()->flash('info', 'User is already a manager of this device');
            return redirect()->back();
        }

        Manager::create([
            'device_id' => $device->id,
            'user_id' => $user->id,
        ]);

        $pass = Pass::where('device_id', $device->id)->where('user_id', $user->id)->get()->first();

        if(!$pass) {
            Pass::create([
                'device_id' => $device->id,
                'user_id' => $user->id,
                'approved' => true
            ]);
        }

        session()->flash('success', $user->name.' is now a manager');
        return redirect('/admin/devices/edit/'.$device->uuid);
    }

    public function destroyManager(Device $device, $user_id)
    {
        $manager = Manager::where('device_id', $device->id)
            ->where('user_id', $user_id)
            ->firstOrFail();

        Manager::destroy($manager->id);

        session()->flash('success', 'Manager successfuly removed from device');

        return redirect('/admin/devices/edit/'.$device->uuid);

    }

    public function destroyHistory(Device $device, History $history)
    {
        History::destroy($history->id);

        session()->flash('success', 'History log successfuly deleted.');

        return redirect('/admin/devices/edit/'.$device->uuid);
    }
}
