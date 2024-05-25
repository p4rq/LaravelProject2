<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        $validator['emailPassword'] = 'Email address or password is incorrect.';
        return redirect("login")->withErrors($validator);
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        $validator['emailPassword'] = 'Email address or password is incorrect.';
        return redirect("login")->withErrors($validator);
    }
//    public function customRegistration(Request $request){
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email',
//            'password' => 'required|min:6',
//        ]);
//        $data = $request->all();
//        $check = $this->create($data);
//        return redirect("dashboard")->withSuccess('You have signed-in');
//    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
