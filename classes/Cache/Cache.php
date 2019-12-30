<?php

namespace Cache;

class Cache
{
    const CACHE_MAX_TIME = 10;

    public function getCacheFilename(string $classname): string
    {
        return CACHE_DIR . '/' . str_replace('\\', '_', strtolower($classname)) . '.json';
    }

    public function getFilename(string $classname): string
    {
        return CLASSES_DIR . '/' . $classname;
    }

    public function getFileContents(string $classname): string
    {
        return file_get_contents($this->getFilename($classname));
    }

    public function hash(string $classname)
    {
        return md5($this->getFileContents($classname));
    }

    public function getCache(string $classname): array
    {
        $fileName = $this->getCacheFilename($classname);
        $hash = null;
        if (!$this->isCached($fileName)) {
            $hash = $this->hash($classname);
            return $this->setCache($fileName, $classname, $hash);
        }

        $cache = json_decode(file_get_contents($fileName), true);
        $hash = $this->hash($classname);
        if ($cache['hash'] !== $hash) {
            return $this->setCache($fileName, $classname, $hash);
        }

        return $cache;
    }

    public function isCached(string $fileName): bool
    {
        return is_file($fileName);
    }

    public function setCache(string $fileName, string $classname, string $hash): array
    {
        $metadata = (new Metadata)->getMetadata($classname);
        $metadata['__hash'] = $hash;
        if (!file_put_contents($fileName, json_encode($metadata, JSON_UNESCAPED_SLASHES))) {
            throw new \Error('Can\'t write to cache.');
        }
        return $metadata;
    }

    public function deleteCache(string $fileName): bool
    {
        return unlink($fileName);
    }

    public function isStale(int $timestamp): bool
    {
        return time() - $timestamp > self::CACHE_MAX_TIME;
    }

    static public function isOutdated(string $hash, string $newHash): bool
    {
        return $hash === $newHash;
    }
}