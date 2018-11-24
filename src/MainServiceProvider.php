<?php

namespace Infoalto\Admin;

use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'admin');

        //VIEWS PUBLISH
        $this->publishes([
            __DIR__.'/views/admin' => base_path('resources/views/admin/'),
            __DIR__.'/views/auth' => base_path('resources/views/auth/'),
            __DIR__.'/views/layout' => base_path('resources/views/layout/'),
        ],'views');
        //CONTROLLERS PUBLISH
        $this->publishes([
            __DIR__.'/controllers' => base_path('app/Http/Controllers/'),
        ],'controllers');
        //PUBLIC PUBLISH
        $this->publishes([
            __DIR__.'/public' => base_path('public/admin/'),
        ],'public');
        //SEEDS PUBLISH
        $this->publishes([
            __DIR__.'/database/seeds' => base_path('database/seeds/'),
        ],'seeds');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->make('Infoalto\Admin\PermissionController');
        //$this->app->make('Infoalto\Admin\RoleController');
    }
}
