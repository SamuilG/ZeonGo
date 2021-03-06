<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\History;
use App\Models\UserKey;
use Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request as HttpRequest;

class ScanController extends Controller
{
    public function process(HttpRequest $request)
    {
        $userKey = $request->userKey;
        $device_key = $request->device_key;

        $device = Device::where('device_key', $device_key)->get()->first();
        
        $check = DB::table('user_keys')
            ->where('user_key', $userKey)
            ->join('passes', 'user_keys.user_id', '=' , 'passes.user_id')
            ->where('approved', true)
            ->where('device_id', $device->id)
            ->select('user_keys.updated_at', 'user_keys.user_id', 'user_keys.user_id')
            ->get();

        if($userKey = '0'){
            return(2);
        }
        if(count($check) == 0){
            return(0);
        }
        $startTime = Carbon::parse($check->first()->updated_at);
        $timeDifference = Carbon::now()->diffInSeconds($startTime);


        if($timeDifference < 60 && count($check) == 1){
            History::create([
                'user_id' => $check->first()->user_id,
                'device_id' => $device->id
            ]);
            UserKey::where('user_id', $check->first()->user_id)->update(array('user_key' => '0'));
            return(1);
        } else {
            return(2);
        }

        // SELECT * FROM `user_keys` JOIN passes ON user_keys.user_id = passes.user_id WHERE user_keys.user_key = 'pihNACDBlACvx4Z0Tcr5srxnA2EdlUDmW23Cgbtdk8HKYXjs9UszBafXs1wxzXzfnOkhh3T23Jhgt7Wyt2ZCBtC4gwDzK0ftJEhN' AND passes.device_id = 2
    }
}
