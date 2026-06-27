<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
 public function create()
 {
     return view('auth.login');
 }

 public function store(LoginRequest $request){
    if(Auth::attempt($request->only('username', 'password'))){
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }
    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ])->onlyInput('username');
 }

 public function destroy(Request $request)
 {
     Auth::logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();
     return redirect()->route('login');
 }

}