<?php
declare(strict_types=1);

namespace Framework\BearSunday\Interceptor;

use BEAR\Resource\ResourceObject;
use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException;
use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;

/**
 * Class FileCacheInterceptor
 *
 * @package Framework\BearSunday\Interceptor
 */
class FileCacheInterceptor implements MethodInterceptor
{
    /** @var CacheInterface */
    private $cache;

    /**
     * FileCacheInterceptor constructor.
     *
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * {@inheritDoc}
     * @return ResourceObject
     * @throws InvalidArgumentException
     */
    public function invoke(MethodInvocation $invocation)
    {
        $cacheId = get_class($invocation->getThis()) . sha1($invocation->getArguments());

        if (!$this->cache->has($cacheId)) {
            $proceed = $invocation->proceed();
            $this->cache->set($cacheId, $proceed);

            return $proceed;
        }

        return $this->cache->get($cacheId);
    }
}
