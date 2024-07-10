<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakePolicy extends Command
{
    protected static $defaultName = 'make:policy';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)
             ->setDescription('Generate a new policy file.')
             ->setHelp('This command allows you to generate new policy file.')
             ->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $policyName = $name.'.php';

        if (!file_exists('policies/'.$name.'.php')) {
            shell_exec("echo php > policies/$policyName");

// add model

file_put_contents("policies/$policyName", "<?php

namespace App\Policy;

use Exception;
use Framework\BlackPearl\Auth;

class $name
{

    // Determine whether the user can create a resource.

    public static function create(\$user) {
        return (\$user === Auth::user()->id) ? true : throw new Exception('This action is unauthorize');
    }

    // Determine whether the user can update a resource.

    public static function update(\$user, \$model) {
        return (\$user === \$model) ? true : throw new Exception('This action is unauthorize');
    }

    // Determine whether the user can delete a resource.

    public static function delete(\$user, \$model) {
        return (\$user === \$model) ? true : throw new Exception('This action is unauthorize');
    }

}");

            // update the autoload
            file_put_contents('config/autoload.php', "\nrequire './policies/$policyName';",FILE_APPEND | LOCK_EX);

            echo "\n";
            echo "\033[0;32mPolicy created successfully on 'policies/$policyName'\033[1;37m";
            echo "\n";
        } else {
            echo "\n";
            echo "\033[0;31mPolicy Already Exists.\033[1;37m";
            echo "\n";
        }
        return Command::SUCCESS;
    }
}

