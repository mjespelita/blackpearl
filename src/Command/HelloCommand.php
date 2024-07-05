<?php

// src/Command/HelloCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    protected static $defaultName = 'app:say-hello';

    protected function configure()
    {
        $this->setDescription('Outputs a hello message.')
             ->setHelp('This command allows you to print a hello message...');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Hello, world!');
        return Command::SUCCESS;
    }
}