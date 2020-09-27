<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * This namespace is applied to your admin controller routes.
     *
     * In addition, it is set as the URL generator's admin namespace.
     *
     * @var string
     */
    protected $adminNamespace = 'App\Http\Controllers\Admin';

    /**
     * This namespace is applied to your staff controller routes.
     *
     * In addition, it is set as the URL generator's admin namespace.
     *
     * @var string
     */
    protected $staffNamespace = 'App\Http\Controllers\Staff';


    /**
     * This namespace is applied to your front controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $frontNamespace = 'App\Http\Controllers\Front';

    /**
     * The path to the "admin" route for your application.
     *
     * @var string
     */
    public const ADMIN = '/admin/category';

    /**
     * The path to the "admin" route for your application.
     *
     * @var string
     */
    public const ADMINLOGIN = '/admin/login';

    /**
     * The path to the "staff" route for your application.
     *
     * @var string
     */
    public const STAFF = '/home';

    /**
     * The path to the "staff" route for your application.
     *
     * @var string
     */
    public const STAFFLOGIN = '/staff/login';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapAdminAuthRoutes();

        $this->mapStaffRoutes();

        $this->mapStaffAuthRoutes();

        $this->mapFrontRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Admin Routes
     */
    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'auth:admin'])
            ->prefix('admin')
            ->name('admin.')
            ->namespace($this->adminNamespace)
            ->group(function ($route) {
                require base_path('routes/admin/admin.php');
            });
    }

    /**
     * Admin Auth Routes
     */
    protected function mapAdminAuthRoutes()
    {
        Route::middleware('web')
            ->prefix('admin')
            ->name('admin.auth.')
            ->namespace($this->adminNamespace)
            ->group(function ($route) {
                require base_path('routes/admin/auth.php');
            });
    }

    /**
     * Staff Routes
     */
    protected function mapStaffRoutes()
    {
        Route::middleware('web')
            ->prefix('staff')
            ->name('staff.')
            ->namespace($this->staffNamespace)
            ->group(function ($route) {
                require base_path('routes/staff/staff.php');
            });
    }

    /**
     * Staff Auth Routes
     */
    protected function mapStaffAuthRoutes()
    {
        Route::middleware('web')
            ->prefix('staff')
            ->name('staff.auth.')
            ->namespace($this->staffNamespace)
            ->group(function ($route) {
                require base_path('routes/staff/auth.php');
            });
    }

    /**
     * Define the "front" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapFrontRoutes()
    {
        Route::middleware(['web', 'emptyLocation'])
            ->namespace($this->frontNamespace)
            ->group(base_path('routes/front.php'));
    }
}
