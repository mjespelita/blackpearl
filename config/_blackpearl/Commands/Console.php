<?php

use Psy\Shell;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BlackPearlConsole extends Command
{
    protected static $defaultName = 'console';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)
             ->setDescription('Command Line Interface.')
             ->setHelp('This command allows you to use BlackPearl integerated console.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // $name = $input->getArgument('name');
        $shell = new Shell();
        $shell->run();
        return Command::SUCCESS;
    }
}
