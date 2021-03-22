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
        $this->mapBusinessSetupRoutes();
        $this->mapEmployeeRoutes();
        $this->mapTimeManagementRoutes();
        $this->mapSalaryRoutes();
        $this->mapReportRoutes();
        //
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
    protected function mapBusinessSetupRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->namespace($this->namespace . '\BusinessSetup')
            ->prefix('business-setup')
            ->group(base_path('routes/businessSetup.php'));
    }
    protected function mapEmployeeRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->namespace($this->namespace . '\Employee')
            ->prefix('employees')
            ->group(base_path('routes/employee.php'));
    }
    protected function mapTimeManagementRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->namespace($this->namespace . '\TimeManagement')
            ->prefix('time-management')
            ->group(base_path('routes/time_management.php'));
    }

    protected function mapSalaryRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->namespace($this->namespace . '\Salary')
            ->prefix('salary')
            ->group(base_path('routes/salary.php'));
    }
    protected function mapReportRoutes()
    {
        Route::middleware(['web', 'auth'])
            ->namespace($this->namespace . '\Report')
            ->prefix('reports')
            ->group(base_path('routes/report.php'));
    }
}
