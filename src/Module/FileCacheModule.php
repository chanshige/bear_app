<?php
namespace Framework\BearSunday\Module;

use Framework\BearSunday\Annotation\FileCache;
use Framework\BearSunday\Interceptor\FileCacheInterceptor;
use Psr\SimpleCache\CacheInterface;
use Ray\Di\AbstractModule;
use ReflectionException;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;

/**
 * Class FileCacheModule
 *
 * @package Framework\BearSunday\Module
 */
final class FileCacheModule extends AbstractModule
{
    /**
     * @throws ReflectionException
     */
    protected function configure()
    {
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith(FileCache::class),
            [FileCacheInterceptor::class]
        );
    }
}
