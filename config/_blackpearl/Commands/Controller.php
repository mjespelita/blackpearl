<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeController extends Command
{
    protected static $defaultName = 'make:controller';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)
             ->setDescription('Generate a new controller file.')
             ->setHelp('This command allows you to generate new controller file.')
             ->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $controllerName = $name.'.php';

        if (!file_exists('controllers/'.$name.'.php')) {
            shell_exec("echo php > controllers/$controllerName");

// add model

file_put_contents("controllers/$controllerName", "<?php

namespace App\Controller;

class $name
{
    public function index()
    {
        // ...
    }
}");

            // update the autoload
            file_put_contents('config/autoload.php', "\nrequire './controllers/$controllerName';",FILE_APPEND | LOCK_EX);

            echo "\n";
            echo "\033[0;32mController created successfully on 'controllers/$controllerName'\033[1;37m";
            echo "\n";
        } else {
            echo "\n";
            echo "\033[0;31mController Already Exists.\033[1;37m";
            echo "\n";
        }
        return Command::SUCCESS;
    }
}

