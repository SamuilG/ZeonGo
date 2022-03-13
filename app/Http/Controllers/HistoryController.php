<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function user(Request $request){
        $history = History::where('user_id', auth()->id());

        if($request->search_device_name){
            $history = $history->where('device_id', $request->search_device_name);
        }

        if($request->search_registered_on){
            $uhistorysers = $history->whereDate('created_at', $request->search_date);
        }

        $history = $history->paginate(15);
        
        return view('scenes.history', compact('history'));
    }
}
