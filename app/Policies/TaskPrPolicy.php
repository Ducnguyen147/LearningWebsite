<?php

namespace App\Policies;

use App\Models\TaskPr;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPrPolicy
{


    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TaskPr $task): bool
    {
        return  $user->id === $task->subject->user->id;
    }

}
