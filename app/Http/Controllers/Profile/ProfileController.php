<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('profile');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
        ]);
        $input = $request->all();
        if($request->filled('name')){
            $input['name'] = $request->name;
        }
        else{
            unset($input['name']);
        }
        if($request->filled('password')) {
            $input['password'] = bcrypt($request->password);
        }
        else{
            unset($input['password']);
        }
        auth()->user()->update($input);
        return back()->with('success', 'Profile updated successfully!');
    }
    public function movies()
    {
        $movies = auth()->user()->movies;
        return view('profile', compact('movies'));
    }
}
