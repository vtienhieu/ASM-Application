<?php

namespace App\Policies;

use App\Categories;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the categories.
     *
     * @param  \App\User  $user
     * @param  \App\Categories  $categories
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->roleID == 1;
    }

    public function updatetrainer(User $user)
    {
        if($user->roleID == 2 || $user->roleID == 3){
            return true;
        }
        
    }
    public function admin(User $user)
    {
        return $user->roleID == 1;
    }
    public function training(User $user)
    {
        return $user->roleID == 2;
    }
    public function trainer(User $user)
    {
        return $user->roleID == 3;
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->roleID == 1;
    }

    /**
     * Determine whether the user can update the categories.
     *
     * @param  \App\User  $user
     * @param  \App\Categories  $categories
     * @return mixed
     */
    public function update(User $user, Categories $categories)
    {
        //
    }

    /**
     * Determine whether the user can delete the categories.
     *
     * @param  \App\User  $user
     * @param  \App\Categories  $categories
     * @return mixed
     */
    public function delete(User $user, Categories $categories)
    {
        //
    }

    /**
     * Determine whether the user can restore the categories.
     *
     * @param  \App\User  $user
     * @param  \App\Categories  $categories
     * @return mixed
     */
    public function restore(User $user, Categories $categories)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the categories.
     *
     * @param  \App\User  $user
     * @param  \App\Categories  $categories
     * @return mixed
     */
    public function forceDelete(User $user, Categories $categories)
    {
        //
    }
}
