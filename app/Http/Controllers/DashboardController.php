<?php

namespace App\Http\Controllers;
use App\Models\Dashboard;
use App\Models\Mqtt_message;
use App\Models\Mqtt_custom_message;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function show()
    {
        $data = Dashboard::all();
        $count = Dashboard::count();
        $latestMessage = Mqtt_message::latest()->first();
        $latestCustomMessage = Mqtt_custom_message::latest()->first();
        return view('dashboard',
        [
            'dashboards'=>$data,
            'count' => $count,
            'latestMessage' => $latestMessage,
            'latestCustomMessage' => $latestCustomMessage

        ]
        );
    }

    function post(Request $request)
    {
        $dashboard = new Dashboard;
        // $dashboard = Dashboard::find(1);
        $dashboard->time = time();
        $dashboard->value1 = $request->value1;
        $dashboard->value2 = $request->value2;
        $dashboard->value3 = $request->value3;
        $dashboard->value4 = $request->value4;
        $dashboard->description = $request->description; 
        $dashboard->save();
        return response()->json(
            [
                "msg" => "Success",
                "payload" => $dashboard
            ]
            );
    }
    
    function get(){
        $data = Dashboard::all();
        return response()->json(
            [
                "msg" => "Success",
                "payload" => $data
            ]
            );
    }

    function value1(){
        $data = Dashboard::all();
        foreach ($data as $dt){
        }
        echo $dt->value1;
    }
    function value2(){
        $data = Dashboard::all();
        foreach ($data as $dt){
        }
        echo $dt->value2;
    }
    function value3(){
        $data = Dashboard::all();
        foreach ($data as $dt){
        }
        echo $dt->value3;
    }
    function value4(){
        $data = Dashboard::all();
        foreach ($data as $dt){
        }
        echo $dt->value4;
    }
}
