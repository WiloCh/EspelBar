<?php

namespace App\Policies;

use App\Campus;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampusPolicy
{
    use HandlesAuthorization;

    /**
     * Check if the user is Admin
     *
     * @param [type] $user
     * @param [type] $ability
     * @return void
     */
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Campus  $campus
     * @return mixed
     */
    public function view(User $user, Campus $campus)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->permissions->contains('slug', 'manager-create')){
            return true;
        }
        
        return false;
    }

    /**
     * Undocumented function
     *
     * @param User $user
     * @param Campus $campus
     * @return void
     */
    public function edit(User $user, Campus $campus){
        if ($user->roles->contains('slug', 'manager')){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Campus  $campus
     * @return mixed
     */
    public function update(User $user, Campus $campus)
    {
        if($user->permissions->contains('slug', 'manager-edit')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Campus  $campus
     * @return mixed
     */
    public function delete(User $user, Campus $campus)
    {
        if($user->permissions->contains('slug', 'manager-delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Campus  $campus
     * @return mixed
     */
    public function restore(User $user, Campus $campus)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Campus  $campus
     * @return mixed
     */
    public function forceDelete(User $user, Campus $campus)
    {
        //
    }
}
