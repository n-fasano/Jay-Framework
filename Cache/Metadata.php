<?php

namespace Cache;

class Metadata
{
    const CACHE_MAX_TIME = 10;

    public function identify($classname)
    {
        $fileName = 'Cache/data/' . md5($classname) . '.json';
        if (!$this->isCached($fileName)) {
            $this->setCache($fileName, new $classname);
        }

        return $this->getCache($fileName, $classname);
    }

    public function getCache($fileName, $classname)
    {
        $metadata = json_decode(file_get_contents($fileName), true);
        if ($this->isStale((int) $metadata['__timestamp'])) {
            $this->setCache($fileName, new $classname);
            $metadata = json_decode(file_get_contents($fileName), true);
        }
        unset($metadata['__timestamp']);
        return $metadata;
    }

    public function setCache($fileName, $object)
    {
        $metadata = $this->getMetadata($object);
        $metadata['__timestamp'] = time();
        file_put_contents($fileName, json_encode($metadata));
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

    public function getMetadata(object $object)
    {
        $reflection = new \ReflectionClass($object);
        $methods = $reflection->getMethods();

        $metadata = [];
        foreach ($methods as $method) {
            $comment = $method->getDocComment();
            preg_match_all('/(@.+)\r\n/', $comment, $matches);
            $matches = $matches[1];

            foreach ($matches as $i => $match) {
                $data = explode(' ', $match);
                $metadata[$method->getName()][$data[0]] = $data[1] ?? null;

                if ($data[0] === '@Route') {
                    $method_params = array_map(function ($param) {
                        return [
                            'name' => $param->getName(),
                            'type' => $param->getType()->getName(),
                            'nullable' => $param->isDefaultValueAvailable()
                        ];
                    }, $method->getParameters());
                    $metadata['__routes'][$data[1]] = [
                        'callable' => [get_class($object), $method->getName()],
                        'route_parameters' => array_filter(explode('/', $data[1]), function ($e) {
                            return $e;
                        }),
                        'parameters' => $method_params
                    ];
                    $metadata[$method->getName()]['parameters'] = $method_params;
                }
            }
        }

        return $metadata;
    }

    public function routeCensus(array $controller_dir, string $hash)
    {
        $routes = [];
        foreach ($controller_dir as $filename) {
            if (is_file("Controllers/$filename")) {
                $controllerName = '\\Controllers\\' . str_replace('.php', '', $filename);
                $controllerMetadata = $this->identify($controllerName);
                if (isset($controllerMetadata['__routes'])) {
                    foreach ($controllerMetadata['__routes'] as $route => $callable) {
                        $routes[$route] = $callable;
                    }
                }
            }
        }

        $data = [
            '__routes' => $routes,
            '__hash' => $hash
        ];

        if (!file_put_contents('Cache/data/__routes.json', json_encode($data))) {
            throw new \Error('Can\'t write to cache.');
        }

        return $data;
    }

    public function getRoutes()
    {
        $controller_dir = array_slice(scandir('Controllers'), 2);
        $contents = '';
        foreach ($controller_dir as $controller) {
            $content_ = file_get_contents("Controllers/$controller");
            if ($content_) {
                $contents .= $content_;
            }
        }
        $hash = md5($contents);

        if (!is_file('Cache/data/__routes.json')) {
            $data = $this->routeCensus($controller_dir, $hash);
        } else {
            $data = json_decode(file_get_contents('Cache/data/__routes.json'), true);

            if ($data['__hash'] !== $hash) {
                $data = $this->routeCensus($controller_dir, $hash);
            }
        }

        return $data['__routes'];
    }
}
