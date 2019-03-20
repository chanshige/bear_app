<?php
namespace Framework\BearSunday\Module;

use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;
use BEAR\Package\Provide\Router\AuraRouterModule;

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
    }
}
