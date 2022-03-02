<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\History;
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
        return view('admin.admin', compact('users', 'devices', 'history', 'passes'));
    }
    public function createDeviceIndex()
    {
        return view('admin.createDevice');
    }
    public function accountAdminSide()
    {
        return view('admin.accountAdminSide');
    }
    public function saveDevice()
    {
        //
    }
}
