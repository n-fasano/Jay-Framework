<?php

namespace Routing;

class RouteMatcher
{
    public function resolve()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $parameters = preg_split(
            '/(\/[^\/]+)/',
            $uri,
            null,
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
        );
        $all_routes = (new \Cache\Metadata)->getRoutes();

        return $this->match($all_routes, $parameters);
    }

    public function match($routes, $uri_parameters)
    {
        $current_route = $routes;
        $function_parameters = [];
        foreach ($uri_parameters as $uri_parameter) {
            if (isset($current_route[$uri_parameter])) {
                $current_route = &$current_route[$uri_parameter];
            } else {
                foreach($current_route as $route => $data) {
                    if (strpos($route, '#')) {
                        $arg = str_replace('/', '', $uri_parameter);
                        $paramType = str_replace('/#', '', $route);
                        if (settype($arg, $paramType)) {
                            $current_route = $data;
                            $function_parameters[] = $arg;
                        }
                    }
                }
            }
        }

        if(!$current_route['callable']) {
            return $this->getDefaultRoute();
        }

        $current_route['callable']['parameters'] = $function_parameters;
        return $current_route['callable'];
    }

    public function getDefaultRoute()
    {
        $data = explode('::', DEFAULT_ROUTE);
        $controller = $data[0];
        $method = $data[1];
        $parameters = [];

        return [
            'controller' => $controller,
            'method' => $method,
            'parameters' => $parameters,
        ];
    }
}
