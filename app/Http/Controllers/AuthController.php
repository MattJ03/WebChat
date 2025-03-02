<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AuthController extends Controller
{
    public function register(Request $request) {

        $user = User::create([
            'name' => 'required|min:1|max:50',
            'email' => 'required|email|unique:users,email',
            'password'
        ]);
    }
}
