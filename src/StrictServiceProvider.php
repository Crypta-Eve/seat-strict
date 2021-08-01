<?php

namespace CryptaEve\Seat\Strict;

use CryptaEve\Seat\SquadSync\Observers\SquadMemberObserver;
use CryptaEve\Seat\Strict\Commands\Audit;
use CryptaEve\Seat\Strict\Observers\RefreshTokenObserver;
use Seat\Eveapi\Models\RefreshToken;
use Seat\Services\AbstractSeatPlugin;
use Seat\Web\Models\Squads\SquadMember;

class StrictServiceProvider extends AbstractSeatPlugin
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->add_routes();
        $this->add_views();
        $this->add_translations();
        $this->add_migrations();
        $this->add_commands();
        $this->add_events();
    }

    private function add_commands()
    {
        $this->commands([
            Audit::class,
        ]);
    }

    /**
     * Include the routes.
     */
    public function add_routes()
    {
        if (! $this->app->routesAreCached()) {
            include __DIR__ . '/Http/routes.php';
        }
    }

    /**
     * Register the custom events that may fire for
     * this package.
     */
    private function add_events()
    {
        RefreshToken::observe(RefreshTokenObserver::class);
        SquadMember::observe(SquadMemberObserver::class);

    }

    public function add_translations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'strict');
    }

    /**
     * Set the path and namespace for the views.
     */
    public function add_views()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'strict');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/strict.sidebar.php',
            'package.sidebar'
        );

        $this->registerPermissions(
            __DIR__ . '/Config/Permissions/strict.permissions.php', 'strict');
    }

    private function add_migrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
    }


    /**
     * Return the plugin public name as it should be displayed into settings.
     *
     * @example SeAT Web
     *
     * @return string
     */
    public function getName(): string
    {
        return 'SeAT Strict';
    }


    /**
     * Return the plugin repository address.
     *
     * @example https://github.com/eveseat/web
     *
     * @return string
     */
    public function getPackageRepositoryUrl(): string
    {
        return 'https://github.com/cryptaeve/seat-strict';
    }

    /**
     * Return the plugin technical name as published on package manager.
     *
     * @example web
     *
     * @return string
     */
    public function getPackagistPackageName(): string
    {
        return 'seat-strict';
    }

    /**
     * Return the plugin vendor tag as published on package manager.
     *
     * @example eveseat
     *
     * @return string
     */
    public function getPackagistVendorName(): string
    {
        return 'cryptaeve';
    }
}
