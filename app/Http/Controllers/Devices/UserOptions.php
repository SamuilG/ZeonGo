<?php

namespace App\Http\Controllers\Devices;

use App\Models\Pass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserOptions extends Controller
{
    public function leaveDevice(Request $request)
    {
        Pass::where('device_id', $request->device_id)
            ->where('user_id', auth()->id())
            ->delete();

            return redirect()->route('home');
    }
}
