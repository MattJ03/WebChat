<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Spatie\Permission\Models\Role;
use App\Models\Server;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
class MessageController extends Controller
{

    public function store(Request $request, Server $server) {
        $request->validate([
           'content' => 'required|string|max:250',
        ]);

        $message = $server->messages()->create([
           'user_id' => Auth::id(),
            'content' => $request->input('content'),

        ]);
        broadcast(new MessageSent($message))->toOthers();
        return response()->json(['message' => $message, 'Message sent successfully']);
    }
}
