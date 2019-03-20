<?php
namespace Framework\BearSunday\Module;

use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;
use BEAR\Package\Provide\Router\AuraRouterModule;
use Ray\AuraSqlModule\AuraSqlModule;
use Ray\AuraSqlModule\AuraSqlQueryModule;

class AppModule extends AbstractAppModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $appDir = $this->appMeta->appDir;
        require_once $appDir . '/env.php';
        $this->install(
            new AuraSqlModule(
                getenv('DATABASE_DSN'),
                getenv('DATABASE_USER'),
                getenv('DATABASE_PASS')
            )
        );
        $this->install(new AuraSqlQueryModule('mysql'));
        $this->install(new AuraRouterModule($appDir . '/config/aura.route.php'));
        $this->install(new PackageModule);
    }
}
