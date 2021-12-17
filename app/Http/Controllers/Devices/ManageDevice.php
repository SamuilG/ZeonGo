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
        $device = Device::where('id', $device_id)
                    ->get();

        $history = History::where('device_id', $device_id)
                    ->join('devices', 'history.device_id', '=', 'devices.id')
                    ->join('users', 'history.user_id', '=', 'users.id')
                    ->select('users.email', 'history.created_at')
                    ->get();

        $members = Pass::where('device_id', $device_id)
                    ->join('users', 'passes.user_id', '=', 'users.id')
                    ->select('users.email', 'passes.created_at')
                    ->get();
        $data = array('device' => $device, 'history' => $history, 'members' => $members);

        return view('devices.manage')->with('data', $data);
    }
}
