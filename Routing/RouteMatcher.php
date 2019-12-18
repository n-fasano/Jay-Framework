<?php

namespace Routing;

class RouteMatcher
{
    public function resolve()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $parameters = array_filter(explode('/', $uri), function ($parameter) {
            return $parameter;
        });
        $all_routes = (new \Cache\Metadata)->getRoutes();

        return $this->match($all_routes, $parameters);
    }

    public function match($routes, $parameters)
    {
        $last_match = DEFAULT_ROUTE;

        $test_route = '/';
        foreach ($routes as $route => $callable) {
            if ($test_route === $route) {
                $last_match = $callable;
            }
        }

        foreach ($parameters as $i => $parameter) {
            $test_route .= $parameter;
            foreach ($routes as $route => $callable) {
                if ($test_route === $route) {
                    $last_match = $callable;
                }

                if (strpos($route, '#')) {
                    if (preg_replace('/#[^\/]+/', $parameter, $route) === $test_route) {
                        $last_match = $callable;
                    }
                }
            }
            $test_route .= '/';
        }

        return $last_match;
    }
}
