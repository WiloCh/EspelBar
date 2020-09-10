<?php

namespace App\Policies;

use App\Buzon;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuzonPolicy
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
     * @param  \App\Buzon  $buzon
     * @return mixed
     */
    public function view(User $user, Buzon $buzon)
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
        if ($user->roles->contains('slug', 'bar-editor')) {
            return true;
        }elseif($user->permissions->contains('slug', 'manager-create')){
            return true;
        }elseif($user->permissions->contains('slug', 'create')){
            return true;
        }
        return false;
    }

    /**
     * Undocumented function
     *
     * @param User $user
     * @param Buzon $buzon
     * @return void
     */
    public function edit(User $user, Buzon $buzon)
    {
        if($user->permissions->contains('slug', 'edit-prod')) {
            return true;
        }elseif ($user->roles->contains('slug', 'manager')){
            return true;
        }elseif ($user->permissions->contains('slug', 'edit')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Buzon  $buzon
     * @return mixed
     */
    public function update(User $user, Buzon $buzon)
    {
        if($user->roles->contains('slug', 'bar-editor')){
            return true;
        } elseif($user->permissions->contains('slug', 'manager-edit')) {
            return true;
        } elseif ($user->permissions->contains('slug', 'edit')){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Buzon  $buzon
     * @return mixed
     */
    public function delete(User $user, Buzon $buzon)
    {
        if($user->permissions->contains('slug', 'manager-delete')) {
            return true;
        } elseif ($user->roles->contains('slug', 'bar-editor')) {
            return true;
        } elseif ($user->permissions->contains('slug', 'delete')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Buzon  $buzon
     * @return mixed
     */
    public function restore(User $user, Buzon $buzon)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Buzon  $buzon
     * @return mixed
     */
    public function forceDelete(User $user, Buzon $buzon)
    {
        //
    }
}
