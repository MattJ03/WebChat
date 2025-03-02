<?php

namespace App\Policies;

use App\Models\User;
use App\Models\server;
use Illuminate\Auth\Access\Response;

class ServerPolicy
{
    /**
     * Determine whether the user can view any models.
     */


    /**
     * Determine whether the user can view the model.
     */


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, server $server): bool
    {
        return $user->id === $server->owner_id || $user->hasRole('admin') || $user->hasRole('moderator');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, server $server): bool
    {
        return $user->id === $server->owner_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */

    /**
     * Determine whether the user can permanently delete the model.
     */

}
