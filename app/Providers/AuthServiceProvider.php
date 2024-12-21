<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

// class AuthServiceProvider extends ServiceProvider
// {

//     // ... baris kode lainnya ...

//     public function boot()
//     {
//         $this->registerPolicies();

//         // Implicitly grant "Super Admin" role all permission checks using can()
//         Gate::before(function ($user, $ability) {
//             if ($user->hasRole('super-admin')) {
//                 return true;
//             }
//         });
//     }
// }