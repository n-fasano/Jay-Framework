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

    public function match($routes, $parameters)
    {
        $last_match = null;

        $test_route = '';
        foreach ($parameters as $i => $parameter) {
            $test_route .= $parameter;
            foreach ($routes as $route => $data) {
                if ($test_route === $route) {
                    $last_match = $data;
                }

                if (
                    strpos($route, '#')
                    && preg_replace('/\/#[^\/]+/', $parameter, $route) === $test_route
                ) {
                    $arg = str_replace('/', '', $parameter);
                    if (settype($arg, $data['parameters'][0]['type'])) {
                        $last_match = $data;
                        $last_match['parameters'] = [
                            $data['parameters'][0]['name'] => $arg,
                        ];
                    }
                }
            }
        }

        return $last_match ?? $this->getDefaultRoute();
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
