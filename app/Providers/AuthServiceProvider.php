<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Post;
use App\User;
use App\Policies\PostPolicy;
use App\policies\UserPolicy;

//aqui se añaden las clases a las que quieres añadir politicas
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-post', 'App\Policies\PostPolicy@edit');

        Gate::define('edit-user', 'App\Policies\UserPolicy@edit');

        Gate::define('edit-comment', 'App\Policies\CommentsPolicy@edit');

        //
    }
}
