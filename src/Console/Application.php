<?php

namespace Maghead\Laravel\Console;

use Pimple\Container;
use CLIFramework\CommandBase;
use Maghead\Runtime\Bootstrap;
use Maghead\Runtime\Config\Config;
use Maghead\Manager\DataSourceManager;
use Maghead\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    protected $dataSourceManager;

    protected $config;

    public function __construct(Container $container = null, CommandBase $parent = null, Config $config = null)
    {
        parent::__construct($container, $parent);
        $this->config = $config;
    }

    public function loadConfig()
    {
        if ($this->config === null) {
            return parent::loadConfig();
        }

        $this->dataSourceManager = DataSourceManager::getInstance();
        Bootstrap::setupForCLI($this->config);

        return $this->config;
    }
}
