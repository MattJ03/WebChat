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
            'password' => Hash::make('required|string|min:5|max:30|confirmed'),
        ]);

        User::create($credentials);
        return route('login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
           'email' => 'required|email',
           'password' =>  'required|string|min:5|max:30',
        ]);
        if(!Auth::attempt($credentials)) {
            return back()->withErrors(['Email or password is invalid']);
        }
        $session = $request->session()->regenerate();
        return route('dashboard');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

}
