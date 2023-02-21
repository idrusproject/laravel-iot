<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IotconfigController extends Controller
{
    public function show()
    {
        return view ('iotconfig',[]);
    }
}
