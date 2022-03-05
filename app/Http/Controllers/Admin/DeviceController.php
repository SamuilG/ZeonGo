<?php

namespace App\Http\Controllers\Admin;

use App\Models\Device;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }

    public function index()
    {
        $devices = Device::paginate(15);

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
}
