<?php

namespace App\Http\Controllers\Devices;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Pass;

class ManageDevice extends Controller
{
    public function index(Request $request){
        $device_id = $request->device_id;

        $device = Device::find($device_id);
        
        $history = $device->history;

        $members = $device->users;
        
        $data = array('device' => $device, 'history' => $history, 'members' => $members);

        return view('devices.manage')->with('data', $data);
    }
}
