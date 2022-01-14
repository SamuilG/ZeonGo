<?php

namespace App\Http\Controllers\Devices;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Pass;

class ManageDevice extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(Device $device){
        
        $history = $device->history;

        $members = $device->users;
        
        $data = array('device' => $device, 'history' => $history, 'members' => $members);

        return view('devices.manage')->with('data', $data);
    }

    public function saveChanges(Request $request, Device $device){
        
        $request->validate([
            'device_name' => 'required',
            'device_description' => 'required',
            'coordinates' => 'required'
        ]);
        // dd($device);
        $device->device_name = $request->device_name;
        $device->device_description = $request->device_description;
        $device->coordinates = $request->coordinates;

        $device->save();
        return redirect('/manage/'.$device->uuid);
    }

    public function approve(Request $request, Device $device)
    {
        $user_id = $request->user_id;
        $device_id = $device->id;

        $currentPass = Pass::where('user_id', $user_id)
            ->where('device_id', $device_id)
            ->get()->first();
        $currentPass->approved = true;

        $currentPass->save();

        return redirect('/manage/'.$device->uuid);
    }
}
