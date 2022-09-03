<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191); //Update defaultStringLength

           \Gate::define('manage-all', function ($user) {
              if ($user->position == 'superuser') {
                  return true;
              }
              return false;
          });

          \Gate::define('manage-pasien', function ($user) {
             if ($user->position == 'admin') {
                 return true;
             }
             return false;
         });

          //\Gate::define('manage-medis', function ($user) {
             // if ($user->position == 'medic1','medic2') {
                 // return true;
             // }
            // return false;
          // });

        \Gate::define('manage-medic1', function ($user) {
             if ($user->position == 'medic1') {
                 return true;
             }
            return false;
          });

          \Gate::define('manage-medic2', function ($user) {
             if ($user->position == 'medic2') {
                 return true;
             }
            return false;
          });            

          \Gate::define('manage-apotek', function ($user) {
             if ($user->position == 'apotek') {
                 return true;
             }
             return false;
         });        
    }
}
