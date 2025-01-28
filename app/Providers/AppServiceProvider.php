<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; 

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
        view()->composer('*', function () {
            $company_info = DB::table('company_info')->first();
            $categories = DB::table('category')->get();
        View::share(['company_info' => $company_info, 'categories' => $categories]);
        });
    }
}
