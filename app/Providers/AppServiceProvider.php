<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      //  admin update-post 
        Gate::define('update',function ($user){
          return $user->role === 'admin';
        });

        // admin Delete-post 
        Gate::define('delete',function ($user){
          return $user->role === 'admin';
        });

        // profile 
        Gate::define('profile',function ($user){
           return $user->role === 'admin';
        });


        // admin-delete 
        Gate::define('adminDelete', function ($user){
          return $user->role === 'user'; 
        });
    }

}
