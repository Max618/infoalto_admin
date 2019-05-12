<?php

namespace Infoalto\Admin;

use Illuminate\Support\ServiceProvider;
use Collective\Html\HtmlServiceProvider;
use Illuminate\Foundation\AliasLoader;

class MainServiceProvider extends ServiceProvider
{
    /** 
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->register(HtmlServiceProvider::class);
        AliasLoader::getInstance(['Form'=>'\Collective\Html\FormFacade', "Html"=>'\Collective\Html\FormFacade']);
        $this->app->register(\Intervention\Image\ImageServiceProvider::class);
        AliasLoader::getInstance(['ImageIntervention' => '\Intervention\Image\Facades\Image']);

        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'admin');

        //MAIN PUBLISH
        $this->publishes([
            __DIR__.'/assets' => base_path('public/admin/'),
            //__DIR__.'/resources/views/admin' => base_path('resources/views/admin/'),
            __DIR__.'/resources/views/auth' => base_path('resources/views/auth/'),
            __DIR__.'/resources/views/layout' => base_path('resources/views/layout/'),
            __DIR__.'/AuthServiceProvider.php' => base_path('app/Providers/AuthServiceProvider.php'),
            __DIR__.'/database/seeds' => base_path('database/seeds/'),
            __DIR__.'web.php' => base_path('routes')
        ],"admin");

        //VIEWS PUBLISH
        $this->publishes([
            __DIR__.'/resources/views/admin' => base_path('resources/views/admin/'),
            __DIR__.'/resources/views/auth' => base_path('resources/views/auth/'),
            __DIR__.'/resources/views/layout' => base_path('resources/views/layout/'),
        ],'views');
        //CONTROLLERS PUBLISH
        $this->publishes([
            __DIR__.'/app/controllers' => base_path('app/Http/Controllers/'),
        ],'controllers');
        //MODELS PUBLISH
        $this->publishes([
            __DIR__.'/app/model' => base_path('app/'),
        ],'models');
        //ASSETS PUBLISH
        $this->publishes([
            __DIR__.'/assets' => base_path('public/admin/'),
        ],'assets');
        //SEEDS PUBLISH
        $this->publishes([
            __DIR__.'/database/seeds' => base_path('database/seeds/'),
        ],'seeds');
        //AUTHSERVICEPROVIDER PUBLISH
        $this->publishes([
            __DIR__.'/AuthServiceProvider.php' => base_path('app/Providers/AuthServiceProvider.php'),
        ],'acl');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Infoalto\Admin\Controllers\UserController');
        $this->app->make('Infoalto\Admin\Requests\UserCreateRequest');
        $this->app->make('Infoalto\Admin\Requests\UserUpdateRequest');
        //$this->app->make('app/helpers.php');
    }
}
