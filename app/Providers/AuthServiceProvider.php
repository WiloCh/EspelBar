<?php

namespace App\Providers;

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
        'App\Menu' => 'App\Policies\MenuPolicy',
        'App\Snack' => 'App\Policies\SnackPolicy',
        'App\Buzon' => 'App\Policies\BuzonPolicy',
        'App\Preferencia' => 'App\Policies\PreferenciaPolicy',
        'App\Bar' => 'App\Policies\BarPolicy',
        'App\Campus' => 'App\Policies\CampusPolicy'

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('isAdmin', function ($user) {
            return $user->roles->first()->slug == 'admin';
        });

        Gate::define('isManager', function ($user) {
            return $user->roles->first()->slug == 'manager';
        });

        Gate::define('isBar Editor', function ($user) {
            return $user->roles->first()->slug == 'bar-editor';
        });
    }
}
