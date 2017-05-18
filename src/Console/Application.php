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
        $this->loader->addNamespace('Maghead\Console\Command');
    }

    public function options($opts)
    {
        if (is_null($this->config) === false) {
            return;
        }

        $opts->add('c|config:', 'the path to the config file')
            ->isa('file');
    }

    public function loadConfig()
    {
        if (is_null($this->config) === true) {
            return parent::loadConfig();
        }

        Bootstrap::setupForCLI($this->config);
        $this->dataSourceManager = DataSourceManager::getInstance();

        return $this->config;
    }
}
