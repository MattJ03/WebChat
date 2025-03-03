<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Server;
use App\Models\User;
use App\Models\Message;
use Spatie\Permission\Models\Role;

class ServerController extends Controller
{
    public function index() {
        $servers = Auth::user()->servers()->paginate(10);
        return view('servers.index', compact('servers'));
    }

    public function create() {
        return view('servers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:40',
        ]);

        $server = Server::create([
            'name' => $request->name,
            'owner_id' => Auth::id(),
        ]);
        $server->users()->attach(Auth::id(), ['role' => 'admin']);
        return redirect()->route('servers.index');
    }

    public function show(Request $request, Server $server) {
        if(!$server->users->contains(Auth::user())) {
            abort(403, 'unauthorized action');
        }
        return view('servers.show', compact('server'));

    }
    public function join($server) {
        if($server->users->contains(Auth::user())) {
            abort(403, 'already a member of this server');
        }
         $server->users()->attach(Auth::id(), ['role' => 'user']);
        return redirect()->route('servers.show', $server);
    }

    public function leaveServer(Server $server) {
        if(!$server->users->contains(Auth::user())) {
            abort(403, 'Not a member of this server');
        }
        $server->users()->detach(Auth::id());
    }

}
