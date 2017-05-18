<?php

namespace Maghead\Laravel\Console\Commands;

use Illuminate\Console\Command;
use Maghead\Laravel\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MagheadCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'maghead';

    /**
     * @var string
     */
    protected $description = 'maghead cli';

    /**
     * @var Application
     */
    protected $app;

    /**
     * __construct.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        parent::__construct();
        $this->app = $app;
    }

    public function fire()
    {
        $this->maghead();
    }


    /**
     * maghead.
     *
     * @param string $cmd
     */
    protected function maghead($cmd = null)
    {
        $command = $this->argument('command');
        $argv = is_string($command) === true ? explode(' ', $command) : $command;
        $argv = array_filter(array_merge(['artisan maghead:'.$cmd, $cmd], $argv));
        if (isset($argv[1]) && $argv[1] == '-d') {
            $ret = $this->app->run($argv);
        } else {
            $ret = $this->app->runWithTry($argv);
        }
    }

    /**
     * change to array input.
     *
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return [\Symfony\Component\Console\Input\InputInterface
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $command = explode(' ', (string) $input);
        array_shift($command);
        foreach ($command as $key => $value) {
            $command[$key] = preg_replace('/^[\'"]|[\'"]$/', '', $value);
        }
        $input = new ArrayInput([
            'command' => implode(' ', $command),
        ]);

        return parent::run($input, $output);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['command', null, InputOption::VALUE_OPTIONAL],
        ];
    }
}
