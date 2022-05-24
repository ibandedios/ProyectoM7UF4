<?php

namespace App\Policies;

use App\Comments;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

//politicas de acceso a comentarios
class CommentsPolicy
{
    use HandlesAuthorization;

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
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function view(User $user, Comments $comments)
    {
        //
    }


    public function edit(User $user, int $userid){
        if(Auth::User()){
            if(Auth::User()->id == $userid || Auth::User()->role_id == 1){
                return true;
            }
        }
        return false;
    }
    
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function update(User $user, Comments $comments)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function delete(User $user, Comments $comments)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function restore(User $user, Comments $comments)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function forceDelete(User $user, Comments $comments)
    {
        //
    }
}
