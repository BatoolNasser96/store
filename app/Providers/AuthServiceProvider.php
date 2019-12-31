<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\AdminPerm;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    //     'App\User' => 'App\Policies\UserPolicy',
    //    \App\Post::class=>\App\Policies\ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('posts', function($user) {
            return $user->hasPerm('posts');
        });

        Gate::define('posts.create', function($user) {
             return $user->hasPerm('posts.create');
        });

        Gate::define('posts.edit', function($user, $post) {
            //$perm = UserPerm::where('user_id', $user->id)->where('perm', 'posts.edit')->count();
            $perm = $user->hasPerm('posts.edit');
            if (!$perm) {
                return false;
            }

            return $post->user_id == $user->id;

        });
         Gate::define('admin.admins.create', function($user) {
             return $user->hasPerm('admin.admins.create');
        });

        Gate::define('admin.admins.edit', function($user, $post) {
            //$perm = UserPerm::where('user_id', $user->id)->where('perm', 'posts.edit')->count();
            $perm = $user->hasPerm('admin.admins.edit');
            if (!$perm) {
                return false;
            }

            return $post->user_id == $user->id;

        });

        Gate::before(function($user, $ability) {
            //return false;
        });

        //
    }
}
