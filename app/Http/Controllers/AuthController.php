<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request) {
        $credentials = $request->validate([
            'name' => 'required|string|min:1|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5|max:30|confirmed',
        ]);
        $credentials['password'] = Hash::make($credentials['password']);
        User::create($credentials);
        return redirect()->route('login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
           'email' => 'required|email',
           'password' =>  'required|string|min:5|max:30',
        ]);
        if(!Auth::attempt($credentials)) {
            return back()->withErrors(['error','Email or password is invalid']);
        }
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
