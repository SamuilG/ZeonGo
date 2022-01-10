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
    
    public function index(Request $request){
        $device_id = $request->device_id;

        $device = Device::find($device_id)->first();
        
        $history = $device->history;

        $members = $device->users;
        
        $data = array('device' => $device, 'history' => $history, 'members' => $members);

        return view('devices.manage')->with('data', $data);
    }

    public function saveChanges(Request $request){
        //dd($request);
        $request->validate([
            'device_id' => 'required',
            'device_name' => 'required|max:100',
            'device_description' => 'required|max:500',
            'coordinates' => 'required'
        ]);
        Device::find($request->id)->update($request);

        return back();
    }
}
