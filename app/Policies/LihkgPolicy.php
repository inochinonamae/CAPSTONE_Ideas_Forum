<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Lihkg;
use App\Models\User;

class LihkgPolicy
{   
 
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lihkg $lihkg): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lihkg $lihkg): bool
    {
        return $lihkg->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lihkg $lihkg): bool
    {
        return $this->update($user, $lihkg);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lihkg $lihkg): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lihkg $lihkg): bool
    {
        //
    }

    public function upvote(User $user, Lihkg $lihkg): bool
{
    return Auth::check();
}

public function downvote(User $user, Lihkg $lihkg): bool
{
    return Auth::check();
}

public function addComment(User $user, Lihkg $lihkg): bool
{
    return Auth::check();
}
}
