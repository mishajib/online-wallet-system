<?php

namespace App\Providers;

use App\Console\Commands\ModelMakeCommand;
use App\Models\Setting;
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
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });

        $this->app->bind('path.public', function() {
            return base_path().'../';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function ($view) {
            $view->with('setting', Setting::first());
        });

        view()->composer('layouts.backend.admin.app', function ($view) {
            $view->with('setting', Setting::first());
        });

        view()->composer('layouts.backend.user.app', function ($view) {
            $view->with('setting', Setting::first());
        });

        view()->composer('layouts.backend.admin.auth.app', function ($view) {
            $view->with('setting', Setting::first());
        });

    }
}
