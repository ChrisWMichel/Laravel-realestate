<?php

namespace App\Policies;

use Illuminate\Notifications\DatabaseNotification;
//use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
//use Illuminate\Auth\Access\Response;

class NotificationPolicy
{

    public function update(User $user, DatabaseNotification $databaseNotification): bool
    {
        return $user->id === $databaseNotification->notifiable_id;
    }


}
