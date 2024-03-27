<?php
namespace Prakash\Todolist\Providers;

use Illuminate\Support\ServiceProvider;
use Prakash\Todolist\Models\Task;
class TodolistServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

         /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'todolist');
        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../views', 'todolist');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../views' => base_path('resources/views/prakash/todolist'),
            ], 'views');
            $this->publishes([
                __DIR__.'/../../config/config.php' => config_path('task.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/todolist'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/todolist'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/todolist'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Prakash\Todolist\Controllers\TodolistController');
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'todolist');

        // Register the main class to use with the facade
        $this->app->singleton('task', function () {
            return new Task;
        });
        // $this->app->bind('task', function () {
        //     return new Task();
        // });
    }
}
