<?php

namespace App\Policies;

use App\Post;
use App\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

//politicas de acceso al post
class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    //index
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Post $post)
    {
        //
        /*if(Auth::User()){
            if(Auth::User()->id == $post->user_id || Auth::User()->role_id == 1){
                return true;
            }
        }
        return false;*/
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        //
        /*if(Auth::User()){
            if(Auth::User()->id == $post->user_id || Auth::User()->role_id == 1){
                return true;
            }
        }
        return false;*/
        return true;
    }


    public function edit(User $user, int $userid)
    {
        //
        if(Auth::User()){
            if(Auth::User()->id == $userid || Auth::User()->role_id == 1){
                return true;
            }
        }
        return false;
        //return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        return true;
    }
}
