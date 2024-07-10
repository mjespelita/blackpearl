<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeMiddleware extends Command
{
    protected static $defaultName = 'make:middleware';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)
             ->setDescription('Generate a new middleware file.')
             ->setHelp('This command allows you to generate new middleware file.')
             ->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $middlewareName = $name.'.php';

        if (!file_exists('middlewares/'.$name.'.php')) {
            shell_exec("echo php > middlewares/$middlewareName");

// add model

file_put_contents("middlewares/$middlewareName", "<?php

namespace App\Middleware;

class $name
{
    public static function activate() {
        
        /**
         * Manage request handling, allowing modular,
         * customizable processing of incoming data and outgoing responses.
         */

        return true;
    }
}");

            // update the autoload
            file_put_contents('config/autoload.php', "\nrequire './middlewares/$middlewareName';",FILE_APPEND | LOCK_EX);

            echo "\n";
            echo "\033[0;32mMiddleware created successfully on 'middlewares/$middlewareName'\033[1;37m";
            echo "\n";
        } else {
            echo "\n";
            echo "\033[0;31mMiddleware Already Exists.\033[1;37m";
            echo "\n";
        }
        return Command::SUCCESS;
    }
}

