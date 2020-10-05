<?php

namespace App\Providers;

use App\ViewComposer\AdminMenuComposer;
use App\ViewComposer\CityComposer;
use App\ViewComposer\SettingComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AdminMenuComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['admin.includes.sidebar'],
            AdminMenuComposer::class
        );

        View::composer(
            ['front.layouts.master', 'front.emails.invoice', 'admin.order.invoice'],
            SettingComposer::class
        );

        View::composer(
            ['admin.includes.header', 'front.home.location', 'front.layouts.header'],
            CityComposer::class
        );
    }
}
