<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Spatie\Permission\Models\Role;
use App\Models\Server;

class MessageController extends Controller
{
    public function sendMessage(Request $request, Server $server) {
        $this->authorize('sendMessage', $server);

        $request->validate([
           'content' => 'required|max:200',
        ]);





    }
}
