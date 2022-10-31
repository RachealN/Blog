<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //prevent against mass assignment globally
        // Model::unguard();

//        Gate::define('admin', function (User $user) {
//            return $user->username === 'Admin';
//        });

        Blade::if('admin', function () {
            return request()->user()->can('admin');
        });
    }
}
