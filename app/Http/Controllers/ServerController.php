<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Server;
use App\Models\User;
use App\Models\Message;

class ServerController extends Controller
{
    public function index() {
        $servers = Auth::user()->servers;
        return view('servers.index', compact('servers'));
    }

    public function create() {
        return view('servers.create');
    }

}
