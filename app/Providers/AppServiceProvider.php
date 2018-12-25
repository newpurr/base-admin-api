<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if we are in the development environment
        // and debug mode is turned on, we will log mysql by default
        if (config('app.debug') && config('app.env') === 'local') {
            \DB::connection()->enableQueryLog();
        }
    
        // Generate Chinese data
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('zh_CN');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
