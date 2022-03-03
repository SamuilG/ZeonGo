<?php

namespace App\Http\Controllers\Scene;

use App\Models\UserKey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Collection;

class RegularController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if (auth()->user()->email_verified != 1) {
            auth()->logout();
            return redirect()->route('login')->with('status', 'Please verify your email');
        }

        $devices = auth()->user()->devices;

        $history = auth()->user()->history;

        $deviceCoords = json_encode(auth()->user()->devicesCoords());

        $manager = Manager::where('user_id', '=', auth()->id())
            ->select('managers.device_id')
            ->get();

        $awaitingUsers = new Collection();
        if(count($manager)){
            $awaitingUsers = Manager::where('managers.user_id', auth()->id())
            ->where('approved', false)
            ->join('passes', 'managers.device_id', '=', 'passes.device_id')
            ->select('managers.device_id')
            ->distinct()
            ->get();
        }

        $key = "https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data=" . $this->createKey();

        $data = array('key' => $key, 'devices' => $devices, 'history' => $history, 'manager' => $manager, 'deviceCoords' => $deviceCoords, 'awaitingUsers' => $awaitingUsers);

        return view('scenes.regular')->with('data', $data);
    }

    private function createKey()
    {
        $key = Str::random(100);
        UserKey::where('user_id', auth()->id())->update(array('user_key' => $key));
        return $key;
    }

    public function userSettings()
    {
        if (auth()->user()->email_verified != 1) {
            auth()->logout();
            return redirect()->route('login')->with('status', 'Please verify your email');
        }

        $devices = auth()->user()->devices;

        $history = auth()->user()->history;

        $deviceCoords = json_encode(auth()->user()->devicesCoords());

        $manager = Manager::where('user_id', '=', auth()->id())
            ->select('managers.device_id')
            ->get();

        $awaitingUsers = new Collection();
        if(count($manager)){
            $awaitingUsers = Manager::where('managers.user_id', auth()->id())
            ->where('approved', false)
            ->join('passes', 'managers.device_id', '=', 'passes.device_id')
            ->select('managers.device_id')
            ->distinct()
            ->get();
        }

        $key = "https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data=" . $this->createKey();

        $data = array('key' => $key, 'devices' => $devices, 'history' => $history, 'manager' => $manager, 'deviceCoords' => $deviceCoords, 'awaitingUsers' => $awaitingUsers);

        return view('scenes.account')->with('data', $data);
    }

    public function history()
    {
        $history = History::where('user_id', auth()->id());

        return view('scene.history');
    }
}
