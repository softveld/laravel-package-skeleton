<?php

namespace Softveld\Skeleton;

use Illuminate\Support\ServiceProvider;
use Softveld\Skeleton\Commands\SkeletonCommand;

class SkeletonServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/skeleton.php', 'skeleton');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Publish migrations
            if (! class_exists('CreateSkeletonTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/skeleton_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }

            // Publish views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/skeleton'),
            ], 'views');

            // Publish config file
            $this->publishes([
                __DIR__.'/../config/skeleton.php' => config_path('skeleton.php'),
            ], 'config');

            // Register commands
            $this->commands([SkeletonCommand::class]);

            // All migrations will be executed when the end-user executes `php artisan migrate`
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            // Load views
            $this->loadViewsFrom(__DIR__.'/../resources/views', 'skeleton');
        }
    }
}
