<?php

namespace App\Policies;

use App\Model\admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can create categories.
     *
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function create(Admin $user)
    {
        foreach ($admin->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == 13) {
                    return true;
                }
            }
        }
    }

    /**
     * Determine whether the admin can update the category.
     *
     * @param  \App\admin  $admin
     * @param  \App\category  $category
     * @return mixed
     */
    public function update(Admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can delete the category.
     *
     * @param  \App\admin  $admin
     * @param  \App\category  $category
     * @return mixed
     */
    public function delete(Admin $user)
    {
        //
    }
}
