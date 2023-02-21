<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|unique:users|max:100',
            'email' => 'required|unique:users|email:dns|max:100',
            'password' => 'required|min:6',
            'verpassword' => 'required|min:6|required_with:password|same:password'
        ]);
        $validatedData['password'] = Hash::make( $validatedData['password']);

        // dd('registration successfuly ');
        User::create($validatedData);
        return redirect('login')->with('success', 'Registrer was successful!');

    }
}
