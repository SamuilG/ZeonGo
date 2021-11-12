<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeviceController extends Controller
{
    public function process(Request $request)
    {
        $userKey = $request->userKey;
        return $userKey;
    }
}
