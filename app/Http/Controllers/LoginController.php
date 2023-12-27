<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Login;
use Illuminate\Support\Facades\Session;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function register()
    {
        return view('admin.register');
    }
    public function save(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new Login;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login.index');
    }
    public function index()
    {
        return view('admin.login');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->passes()) {
            $user = Login::where('email', $request->email)->first();
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('logIn', $user->id);
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login.index')->with('error', 'Email and password incorrect');
            }
        } else {
            return redirect()->route('login.index')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }

    public function dashboard()
    {
        $data = array();
        if (Session::has('logIn')) {
            $data = Login::where('id', '=', Session::get('logIn'))->first();
        }

        // dd($data);
        return view('admin.dashboard', compact('data'));
    }
    public function logout()
    {
        if (Session::has('logIn')) {
            Session::pull('logIn');
            return redirect()->route('login.index');
        }
    }

    // send mail
    public function getmail()
    {
        return view('mail.forget');
    }
    public function sendmail(Request $request)
    {
        $mail = $request->email;
        // dd($mail);
        // $user = Login::all();
        // dd($user);
        // if ($user->email == $mail) {
        # code...
        // $user = Login::update($request->all());
        $mailData = [
            'title' => 'Mail from vivekhiranwal1@gmail.com',
            'body' => 'This is for testing email using smtp.'
        ];
        Mail::to($mail)->send(new DemoMail($mailData));
        // dd("Email is sent successfully.");
        // }
        return redirect()->route('login.index');
    }
    public function getpassword()
    {
        // $user  = Login::find($id);
        // $data = compact('user');
        return view('mail.password');
    }
    public function updatepassword($id, Request $request)
    {
        $user = Login::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login.index');
    }
}


// <a href="{{ route('edit', ['id' => $data->id]) }}"