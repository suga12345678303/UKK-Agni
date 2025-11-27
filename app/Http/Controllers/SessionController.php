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
    
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        // Redirect berdasarkan role
        if (auth()->user()->role == 'admin') {
            return redirect('/receipts'); // Halaman admin
        } else {
            return redirect('/user'); // Halaman user
        }
    }

    return back()->with('error', 'Email atau password salah!');
}
    
    // PERBAIKAN #4: Logout lebih secure
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('sesi')->with('success', 'Logout Successful');
    }
}