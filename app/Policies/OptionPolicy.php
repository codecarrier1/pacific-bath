<?php

namespace App\Policies;

use App\Option;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OptionPolicy
{
    use HandlesAuthorization;

    /**
     * @param  \App\User  $user
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability)
    {
//        if ($user->can('edit_everything')) {
//            return true;
//        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Option  $model
     * @return mixed
     */
    public function update(User $user, Option $model)
    {
        return true;
    }
}
