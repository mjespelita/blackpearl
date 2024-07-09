<?php

use Dotenv\Dotenv;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Database extends Command
{
    protected static $defaultName = 'db:migrate';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)
             ->setDescription('Imports tables to the database.')
             ->setHelp('This command allows you to import tables to the database.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../..');
        $dotenv->load();

        $dbHost = $_ENV['DB_HOST'];
        $dbUsername = $_ENV['DB_USERNAME'];
        $dbPassword = $_ENV['DB_PASSWORD'];
        $dbName = $_ENV['DB_NAME'];

        $dropDatabase = shell_exec("mysql -h $dbHost -u $dbUsername -p $dbPassword -e \"DROP DATABASE IF EXISTS $dbName;\"");
        $crateDatabase = shell_exec("mysql -h $dbHost -u $dbUsername -p $dbPassword -e \"CREATE DATABASE IF NOT EXISTS $dbName;\"");

        $migrate = shell_exec('php database/migrations/tables.php');

        if ($migrate === null) {

            echo "\n";
            echo "\033[0;32mTables migrated successfully!\033[1;37m";
            echo "\n";

            exit;
        } else {
            echo "Something went wrong.";
        }
        return Command::SUCCESS;
    }
}

