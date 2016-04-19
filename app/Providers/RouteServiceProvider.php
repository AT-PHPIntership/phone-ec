<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    // protected $namespace = 'App\Http\Controllers';
    protected $feNamespace = 'App\Http\Frontend\Controllers';
    protected $beNamespace = 'App\Http\Backend\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param \Illuminate\Routing\Router $router router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router router
     *
     * @return void
     */
    public function map(Router $router)
    {
        // $router->group(['namespace' => $this->namespace], function ($router) {
        //     require app_path('Http/routes.php');
        // });
        $router->group(['prefix' => 'admin', 'namespace' => $this->beNamespace], function ($router) {
            require app_path('Http/Backend/routes.php');
        });
        $router->group(['namespace' => $this->feNamespace], function ($router) {
            require app_path('Http/Frontend/routes.php');
        });
    }
}
