<?php

namespace App\Http\Controllers\Devices;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Pass;
use App\Models\User;

class ManageDevice extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Device $device)
    {
        if (!auth()->user()->isManager($device->id)) {
            return redirect('/home');
        }

        $history = $device->history;

        $members = $device->users;

        $managers = $device->managers;
        
        $data = array('device' => $device, 'history' => $history, 'members' => $members, 'managers' => $managers);

        return view('devices.manage')->with('data', $data);
    }

    public function saveChanges(Request $request, Device $device)
    {
        if (!auth()->user()->isManager($device->id)) {
            return redirect('/home');
        }

        $request->validate([
            'device_name' => 'required',
            'device_description' => 'required',
            'coordinates' => 'required'
        ]);

        $device->device_name = $request->device_name;
        $device->device_description = $request->device_description;
        $device->coordinates = $request->coordinates;

        $device->save();
        return redirect('/manage/' . $device->uuid);
    }

    public function approve(Device $device, User $user)
    {
        if (!auth()->user()->isManager($device->id)) {
            return redirect('/home');
        }

        $user_id = $user->id;
        $device_id = $device->id;

        $currentPass = Pass::where('user_id', $user_id)
            ->where('device_id', $device_id)
            ->get()->first();
        $currentPass->approved = true;

        $currentPass->save();

        return redirect('/manage/' . $device->uuid);
    }

    public function decline(Device $device, User $user)
    {
        if (!auth()->user()->isManager($device->id)) {
            return redirect('/home');
        }
        if ($user->isManager($device->id)) {
            return redirect('/manage/' . $device->uuid);
        }
        Pass::where('user_id', $user->id)
            ->where('device_id', $device->id)
            ->delete();
        return redirect('/manage/' . $device->uuid);
    }
}
