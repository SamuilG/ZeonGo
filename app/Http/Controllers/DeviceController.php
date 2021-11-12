<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DeviceController extends Controller
{
    public function process(Request $request)
    {
        $userKey = $request->userKey;
        $check = DB::table('user_keys')
            ->where('user_key', $userKey)
            ->join('passes', 'user_keys.user_id', '=' , 'passes.user_id')
            ->where('device_id', 1)
            ->get();
        //dd($userKey);
        return(count($check));

        // SELECT * FROM `user_keys` JOIN passes ON user_keys.user_id = passes.user_id WHERE user_keys.user_key = 'pihNACDBlACvx4Z0Tcr5srxnA2EdlUDmW23Cgbtdk8HKYXjs9UszBafXs1wxzXzfnOkhh3T23Jhgt7Wyt2ZCBtC4gwDzK0ftJEhN' AND passes.device_id = 2
    }
}
