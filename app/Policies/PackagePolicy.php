<?php

namespace App\Policies;

use App\Models\Package;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class PackagePolicy
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

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('view-any-categories');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Package  $package
     * @return mixed
     */
    public function view(User $user, Package $package)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('view-categories');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('create-categories');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Package  $package
     * @return mixed
     */
    public function update(User $user, Package $package)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('update-categories');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Package  $package
     * @return mixed
     */
    public function delete(User $user, Package $package)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('delete-categories');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Package  $package
     * @return mixed
     */
    public function restore(User $user, Package $package)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('restore-categories');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Package  $package
     * @return mixed
     */
    public function forceDelete(User $user, Package $package)
    {
        return $user->isSuperAdmin() || $user->hasPermissionTo('force-delete-categories');
    }
}
