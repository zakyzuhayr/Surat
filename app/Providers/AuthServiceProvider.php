<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('is_sekretaris', function(User $user) {
            return $user->roles === 'sekretaris';
        });
        
        Gate::define('is_kepalabidang', function(User $user) {
            return $user->roles === 'kepalabidang';
        });

        Gate::define('is_p3mp', function(User $user) {
            return $user->roles === 'p3mp';
        });

        Gate::define('is_admin', function(User $user) {
            return $user->roles === 'admin';
        });
    }
}
