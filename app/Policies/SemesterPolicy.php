<?php

namespace App\Policies;

use App\Semester;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SemesterPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function views(User $user, Semester $semester)
    {
        return $user->id === $semester->user_id;
    }

    public function edit(User $user, Semester $semester)
    {
        return $user->id === $semester->user_id;
    }

    public function delete(User $user, Semester $semester)
    {
        return $user->id === $semester->user_id;
    }
}
