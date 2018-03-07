<?php

namespace Bantenprov\DPPBankDunia;

use Illuminate\Support\ServiceProvider;
use Bantenprov\DPPBankDunia\Console\Commands\DPPBankDuniaCommand;

/**
 * The DPPBankDuniaServiceProvider class
 *
 * @package Bantenprov\DPPBankDunia
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class DPPBankDuniaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
        $this->seedHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('dpp-bank-dunia', function ($app) {
            return new DPPBankDunia;
        });

        $this->app->singleton('command.dpp-bank-dunia', function ($app) {
            return new DPPBankDuniaCommand;
        });

        $this->commands('command.dpp-bank-dunia');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'dpp-bank-dunia',
            'command.dpp-bank-dunia',
        ];
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('dpp-bank-dunia.php');

        $this->mergeConfigFrom($packageConfigPath, 'dpp-bank-dunia');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'dpp-bank-dunia-config');
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'dpp-bank-dunia');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/dpp-bank-dunia'),
        ], 'dpp-bank-dunia-lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'dpp-bank-dunia');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/dpp-bank-dunia'),
        ], 'dpp-bank-dunia-views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'dpp-bank-dunia-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'dpp-bank-dunia-migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'dpp-bank-dunia-public');
    }

    public function seedHandle()
    {
        $packageSeedPath = __DIR__.'/database/seeds';

        $this->publishes([
            $packageSeedPath => base_path('database/seeds')
        ], 'dpp-bank-dunia-seeds');
    }
}
