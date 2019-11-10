<?php

namespace Sweet\Routes;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class RoutesController
{
    /**
     * Show pretty routes.
     *
     * @return View
     */
    public function __invoke()
    {
        $middlewareClosure = static function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        };

        $routes = collect(Route::getRoutes());

        foreach (config('sweet-routes.hide_matching') as $regex) {
            $routes = $routes->filter(static function ($value) use ($regex) {
                return !preg_match($regex, $value->uri());
            });
        }

        return view('sweet-routes::routes', compact(['routes', 'middlewareClosure']));
    }
}
