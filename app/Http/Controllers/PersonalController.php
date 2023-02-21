<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function show()
    {
        $dataUser = Auth::user();
        // var_dump($user);
        return view ('personal',['user'=>$dataUser]);
    }
}
