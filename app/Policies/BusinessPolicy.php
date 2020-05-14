<?php

namespace App\Policies;

use App\Business;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinessPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any businesses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the business.
     *
     * @param  \App\User  $user
     * @param  \App\Business  $business
     * @return mixed
     */
    public function view(User $user, Business $business)
    {
        //
    }

    /**
     * Determine whether the user can create businesses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the business.
     *
     * @param  \App\User  $user
     * @param  \App\Business  $business
     * @return mixed
     */
    public function update(User $user, Business $business)
    {
        return $user->id == $business->user_id;
    }

    /**
     * Determine whether the user can delete the business.
     *
     * @param  \App\User  $user
     * @param  \App\Business  $business
     * @return mixed
     */
    public function delete(User $user, Business $business)
    {
        //
    }

    /**
     * Determine whether the user can restore the business.
     *
     * @param  \App\User  $user
     * @param  \App\Business  $business
     * @return mixed
     */
    public function restore(User $user, Business $business)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the business.
     *
     * @param  \App\User  $user
     * @param  \App\Business  $business
     * @return mixed
     */
    public function forceDelete(User $user, Business $business)
    {
        //
    }
}
