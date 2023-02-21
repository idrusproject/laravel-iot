<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Carbon\Carbon;

class HistoryController extends Controller
{
    function show()
    {
        $data = History::all();
        return view('history',['histories'=>$data]);
    }

    function post(Request $request)
    {
        $history = new History;
        $history->date = time();
        $history->uid = $request->uid;
        $history->type = $request->type;
        $history->description = $request->description; 

        $history->save();
        return response()->json(
            [
                "msg" => "Success",
                "payload" => $history
            ]
            );
    }
    
    function get(){
        // $data = History::all();
        $startOfToday = Carbon::today()->startOfDay();
        $endOfToday = Carbon::today()->endOfDay();
        $data = History::whereBetween('created_at', [$startOfToday, $endOfToday])->get();
        return response()->json(
            [
                "msg" => "Success",
                "payload" => $data
            ]
            );
    }

    public function deleteAllData(Request $request)
    {
        History::truncate();

        return redirect()->back()->with('success', 'All data has been deleted.');
    }

    public function deleteData($id)
    {
        History::find($id)->delete();
        return redirect()->back();
    }
}
