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
    
    public function create()
    {
        //
    }

    public function store(DeviceRequest $request)
    {
        Device::create($request->validated());

        return redirect()->route('admin.index');
    }

    public function show(Device $id)
    {
        //
    }

    public function edit(Device $id)
    {
        //
    }

    public function update(DeviceRequest $request, Device $device)
    {
        Device::update($request->validated());
        
        return redirect()->route('admin.index');
    }

    public function destroy(Device $device)
    {
        Device::delete($device->id);

        return redirect()->route('admin.index');
    }
}
