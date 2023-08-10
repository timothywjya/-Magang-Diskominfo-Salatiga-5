<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isAdmin', function($user) {
            return $user->level == 'admin';
         });
         Gate::define('isAdminDinas', function($user) {
             return $user->level == 'operator';
         });
         Gate::define('admin-menu', function(?User $user) {
            return $user->level =='admin';
        });
        Gate::define('dinas-menu', function(?User $user) {
            return $user->level =='operator';
        });
         Gate::define('update-post', function ($user, $post) {
             return $user->id === $post->user_id;
         });
     }
}