<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\Models\Login;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required', 
            'email'=>'required', 
            'password'=>'required'
        ]);

        $user = new Login;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login.index');
    }
}
