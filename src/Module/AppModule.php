<?php
namespace Framework\BearSunday\Module;

use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;
use BEAR\Package\Provide\Router\AuraRouterModule;
use Chanshige\Whois;
use Chanshige\WhoisInterface;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;

class AppModule extends AbstractAppModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $appDir = $this->appMeta->appDir;
        require_once $appDir . '/env.php';
        $this->install(new AuraRouterModule($appDir . '/config/aura.route.php'));
        $this->install(new PackageModule);
        $this->install(new FileCacheModule);

        $this->bind(WhoisInterface::class)->to(Whois::class);
        $this->bind(CacheInterface::class)->toInstance(
            new Psr16Cache(
                new FilesystemAdapter(
                    'cache',
                    '60',
                    $appDir . '/var/cache'
                )
            )
        );
    }
}
