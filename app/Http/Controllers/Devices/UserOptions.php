<?php

namespace App\Http\Controllers\Devices;

use App\Models\Pass;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JoinDeviceRequest;

class UserOptions extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function leaveDevice(Request $request)
    {
        Pass::where('device_id', $request->device_id)
            ->where('user_id', auth()->id())
            ->delete();

            return redirect()->route('home');
    }

    public function addDevice(JoinDeviceRequest $request){
        $device = Device::where('device_key', $request->validated())->first();
        $check = Pass::where('user_id', auth()->id())
                    ->where('device_id', $device->id)->first();
        if($check){
            return redirect()->back()->with('status', 'You have already joined');
        }
        // dd($device->id);
        if(!$device){
            return redirect()->back()->with('status', 'The code is invalid');
        }
        Pass::create([
            'device_id' => $device->id,
            'user_id' => auth()->id(),
            'approved' => false,
            'invited_by' => 0,
        ]);
        return redirect()->back()->with('status', 'Succesfuly, joined! Please wait for a manager to approve your request to join');
    }

    public function accept(Device $device)
    {
        $user_id = auth()->id();
        $device_id = $device->id;

        $currentPass = Pass::where('user_id', $user_id)
            ->where('device_id', $device_id)
            ->get()->first();
        $currentPass->approved = true;
        $currentPass->approved_by = auth()->id();

        $currentPass->save();

        return redirect('/home');
    }
}
