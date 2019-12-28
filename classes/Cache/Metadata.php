<?php

namespace Cache;

class Metadata
{
    const CACHE_MAX_TIME = 10;

    public function identify($classname)
    {
        $fileName = 'classes/Cache/data/' . str_replace('\\', '_', strtolower($classname)) . '.json';
        if (!$this->isCached($fileName)) {
            $this->setCache($fileName, $classname);
        }

        return $this->getCache($fileName, $classname);
    }

    public function getCache($fileName, $classname)
    {
        $metadata = json_decode(file_get_contents($fileName), true);
        if ($this->isStale((int) $metadata['__timestamp'])) {
            $this->setCache($fileName, $classname);
            $metadata = json_decode(file_get_contents($fileName), true);
        }
        unset($metadata['__timestamp']);
        return $metadata;
    }

    public function setCache($fileName, $classname)
    {
        $metadata = $this->getMetadata($classname);
        $metadata['__timestamp'] = time();
        file_put_contents($fileName, json_encode($metadata, JSON_UNESCAPED_SLASHES));
        return $metadata;
    }

    public function deleteCache($fileName)
    {
        return unlink($fileName);
    }

    public function isStale($timestamp)
    {
        return time() - $timestamp > self::CACHE_MAX_TIME;
    }

    public function isCached($fileName)
    {
        return is_file($fileName);
    }

    public function getMetadata(string $classname)
    {
        $object = new $classname;
        $reflection = new \ReflectionClass($object);

        $metadata = [];
        $classComment = $reflection->getDocComment();
        preg_match_all('/(@.+)\r\n/', $classComment, $matches);
        $matches = $matches[1];
        foreach ($matches as $match) {
            $data = explode(' ', $match);
            $info = $data[0];
            $metadata[$info] = $data[1] ?? null;
        }

        $methods = $reflection->getMethods();
        foreach ($methods as $method) {
            $comment = $method->getDocComment();
            preg_match_all('/(@.+)\r\n/', $comment, $matches);
            $matches = $matches[1];

            foreach ($matches as $match) {
                $data = explode(' ', $match);
                $info = $data[0];
                $methodName = $method->getName();
                $metadata[$methodName][$info] = $data[1] ?? null;

                switch ($info) {
                    case '@Route':
                        $route = $data[1];
                        $metadata['__routes'][$route] = $this->analyzeRoute($route, $method, $object);
                        $metadata[$methodName]['parameters'] = $metadata['__routes'][$route]['parameters'];
                        break;
                }
            }
        }

        return $metadata;
    }

    public function routeCensus(array $controllers, string $hash)
    {
        $routes = [];
        foreach ($controllers as $controllerName) {
            $controllerMetadata = $this->identify($controllerName);

            $baseRoute = '';
            if (isset($controllerMetadata['@Route'])) {
                $baseRoute = $controllerMetadata['@Route'];
                $routes[$baseRoute] = [];
            }

            if (isset($controllerMetadata['__routes'])) {
                foreach ($controllerMetadata['__routes'] as $route => $callable) {
                    $route_split = preg_split(
                        '/(\/[^\/]+)/',
                        $route,
                        null,
                        PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
                    );

                    if ($baseRoute)
                        $current_array = &$routes[$baseRoute];
                    else
                        $current_array = &$routes;

                    foreach ($route_split as $r) {
                        if (!isset($current_array[$r])) {
                            $current_array[$r] = [];
                        }
                        $current_array = &$current_array[$r];
                    }

                    $current_array['callable'] = $callable;
                }
            }
        }

        ksort($routes);

        $data = [
            '__routes' => $routes,
            '__hash' => $hash
        ];

        if (!file_put_contents('classes/Cache/data/__routes.json', json_encode($data, JSON_UNESCAPED_SLASHES))) {
            throw new \Error('Can\'t write to cache.');
        }

        return $data;
    }

    public function getRoutes()
    {
        $controllers = $this->getControllers();
        $contents = '';
        foreach ($controllers as $controllerPath => $controllerName) {
            $content_ = file_get_contents($controllerPath);
            if ($content_) {
                $contents .= $content_;
            }
        }
        $hash = md5($contents);

        if (!is_file('classes/Cache/data/__routes.json')) {
            $data = $this->routeCensus($controllers, $hash);
        } else {
            $data = json_decode(file_get_contents('classes/Cache/data/__routes.json'), true);

            if ($data['__hash'] !== $hash) {
                $data = $this->routeCensus($controllers, $hash);
            }
        }

        return $data['__routes'];
    }

    public function analyzeRoute(string $route, \ReflectionMethod $method, object $object)
    {
        $methodName = $method->getName();
        $method_params = array_map(function ($param) {
            return [
                'name' => $param->getName(),
                'type' => $param->getType()->getName(),
                'nullable' => $param->isDefaultValueAvailable()
            ];
        }, $method->getParameters());

        return [
            'controller' => get_class($object),
            'method' => $methodName,
            'route_parameters' => array_filter(explode('/', $route), function ($e) {
                return $e;
            }),
            'parameters' => $method_params
        ];
    }

    public function getControllers()
    {
        $directory = new \RecursiveDirectoryIterator(CONTROLLER_DIR);
        $iterator = new \RecursiveIteratorIterator($directory);
        $files = [];
        foreach ($iterator as $info) {
            if ($info->isFile()) {
                $path = $info->getPathname();
                $controllerRelativePath = substr($path, strpos($path, 'Controllers'));
                $controllerName = str_replace('.php', '', $controllerRelativePath);
                $files[$path] = $controllerName;
            }
        }

        return $files;
    } 
}
