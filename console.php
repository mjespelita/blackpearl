#!/usr/bin/env php

<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    protected static $defaultName = 'app:say-hello';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)
             ->setDescription('Outputs a hello message.')
             ->setHelp('This command allows you to print a hello message...')
             ->addArgument('name', InputArgument::REQUIRED, 'Who?');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $output->writeln('Hello, '.$name.'!');
        return Command::SUCCESS;
    }
}

class NewCommand extends Command
{
    protected static $defaultName = 'app:new-command';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)
             ->setDescription('Outputs a hello message.')
             ->setHelp('This command allows you to print a hello message...');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Hello, newCommand!');
        return Command::SUCCESS;
    }
}

$application = new Application();
$application->add(new HelloCommand());
$application->add(new NewCommand());
$application->run();
