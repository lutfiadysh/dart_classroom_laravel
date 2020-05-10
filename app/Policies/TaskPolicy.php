<?php

namespace App\Policies;

use App\User;
use App\Collect;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function complete(User $user, Collect $task)
    {
        return $user->is($task->user);
    }
}
