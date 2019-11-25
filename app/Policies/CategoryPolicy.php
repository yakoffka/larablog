<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * The before method will be executed before any other methods on the policy, giving you an opportunity to authorize the action before the intended policy method is actually called.
     *
     * @param  \App\User  $user
     * @return mixed [TRUE, FALSE, NULL]
     */
    public function before($user, $ability)
    {
        // if ($user->isSuperAdmin()) {
        //     return true;
        // }
    }

    /**
     * Determine whether the user can view any categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        dd(__METHOD__);
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        dd(__METHOD__);
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        dd(__METHOD__);
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * // @return mixed ?? TRUE or FALSE ???
     *
     * @return bool
     * https://laravel.com/docs/5.8/authorization#policy-methods
     * The update method will receive a User and a Post instance as its arguments, and should return true or false indicating whether the user is authorized to update the given Post.
     */
    public function update(User $user, Category $category)
    {
        // return TRUE;
        // dd(__METHOD__);
        // session()->flash('message', __('message_category_update'));
        return $user->id === $category->author_id;
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        dd(__METHOD__);
    }

    /**
     * Determine whether the user can restore the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function restore(User $user, Category $category)
    {
        dd(__METHOD__);
    }

    /**
     * Determine whether the user can permanently delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function forceDelete(User $user, Category $category)
    {
        dd(__METHOD__);
    }
}
