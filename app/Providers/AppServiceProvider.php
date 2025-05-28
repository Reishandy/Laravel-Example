<?php

namespace App\Providers;

use App\Models\Aircraft;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

//        Gate::define('aircraft', function (User $user, Aircraft $aircraft) {
//            return $aircraft->manufacturer->user->is($user);
//        });
    }
}
