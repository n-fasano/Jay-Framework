<?php

namespace Routing;

class RouteMatcher
{
    public function resolve(string $path): array
    {
        $segments = preg_split(
            '/(\/[^\/]+)/',
            $path,
            null,
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
        );
        $all_routes = (new \Cache\Metadata)->getRoutes();

        return $this->match($all_routes, $segments);
    }

    public function match(array $routes, array $path_segments): array
    {
        $current_route = $routes;
        $method_parameters = [];
        foreach ($path_segments as $segment) {
            if (isset($current_route[$segment])) {
                $current_route = &$current_route[$segment];
            } else {
                foreach($current_route as $route => $data) {
                    if (strpos($route, '#')) {
                        $arg = str_replace('/', '', $segment);
                        $paramType = str_replace('/#', '', $route);
                        if (settype($arg, $paramType)) {
                            $current_route = $data;
                            $method_parameters[] = $arg;
                        }
                    }
                }
            }
        }

        if(!isset($current_route['callable'])) {
            if (!isset($current_route['/'])) {
                return self::getDefaultRoute();
            }
            $current_route = $current_route['/'];
        }

        $current_route['callable']['parameters'] = $method_parameters;
        return $current_route['callable'];
    }

    public static function getDefaultRoute(): array
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
