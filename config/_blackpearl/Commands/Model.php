<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeModel extends Command
{
    protected static $defaultName = 'make:model';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)
             ->setDescription('Generate a new model file.')
             ->setHelp('This command allows you to generate new model file.')
             ->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $modelName = $name.'.php';
        // lowercase
        $lowerModelName = strtolower($name);

        if (!file_exists('models/'.$name.'.php')) {
            shell_exec("echo php > models/$modelName");

// add model

file_put_contents("models/$modelName", "<?php

namespace Framework\Models;

use Illuminate\Database\Eloquent\Model;

class $name extends Model
{
    protected \$table = '$lowerModelName';

    protected \$fillable = [];
}");

// update the migration table

file_put_contents('database/migrations/tables.php', "\n\n// $lowerModelName table \n Capsule::schema()->create('$lowerModelName', function (Blueprint \$table) {
    \$table->increments('id');
    \$table->timestamps();
});", FILE_APPEND | LOCK_EX);

            // update the autoload
            file_put_contents('config/autoload.php', "\nrequire './models/$modelName';",FILE_APPEND | LOCK_EX);

            echo "\n";
            echo "\033[0;32mModel created successfully on 'models/$modelName'\033[1;37m.";
            echo "\n";
            echo "\033[0;32mdatabase/migrations/tables.php updated successfully.\033[1;37m";
            echo "\n";
        } else {
            echo "\n";
            echo "\033[0;31mModel Already Exists.\033[1;37m";
            echo "\n";
        }
        return Command::SUCCESS;
    }
}

