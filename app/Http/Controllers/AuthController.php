<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AuthController extends Controller
{
    public function register(Request $request) {
        $credentials = $request->validate([
            'name' => 'required|string|min:1|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5|max:30|confirmed',
        ]);

        User::create($credentials);
        return route('login');
    }

}
