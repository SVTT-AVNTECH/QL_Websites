<?php

namespace App\Policies;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostsPolicy
{
    /**
     * Determine whether the user can view any models.
     */

     use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
        
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Posts $posts): bool
    {
        //
        return (
            $post->status == Post::STATUS_PUBLISHED ||
            ($user && (
                $user->id == $post->user_id
                || $user->hasPermission('review_post')
            ))
        );

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->hasVerifiedEmail();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Posts $posts): bool
    {
        //
        return ($user->id == $post->user_id || $user->hasPermission('update_post'));

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Posts $posts): bool
    {
        //
        return ($user->id == $post->user_id || $user->hasPermission('delete_post'));

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Posts $posts): bool
    {
        //
        return ($user->id == $post->user_id || $user->hasPermission('restore_post'));

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Posts $posts): bool
    {
        //
        return ($user->id == $post->user_id || $user->hasPermission('force_delete_post'));
    }
}
