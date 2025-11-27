<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        return view('sesi/index');
    }
    
    public function login(Request $request){
        Session::flash('email', $request->email);

        // PERBAIKAN #1: Validasi dengan pesan error yang benar
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Enter Your Email!!',
            'email.email' => 'Email format is invalid!!',
            'password.required' => 'Enter Your Password!!',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::attempt($infologin)){
            $request->session()->regenerate(); // Security
            // PERBAIKAN #2: Redirect ke '/' bukan 'Digital receipts'
            return redirect('/')->with('success', 'Login Successful');
        } else {
            // PERBAIKAN #3: Pakai 'error' bukan 'Success'
            return redirect('sesi')->with('error', 'Username Or Password Incorrect');
        }
    }
    
    // PERBAIKAN #4: Logout lebih secure
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('sesi')->with('success', 'Logout Successful');
    }
}