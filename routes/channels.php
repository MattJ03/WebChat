<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Server;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('server.{server_id}', function ($user, $server_id) {
    return Server::find($server_id)->users->contains($user);
});
