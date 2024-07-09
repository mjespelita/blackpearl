<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeView extends Command
{
    protected static $defaultName = 'make:view';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)
             ->setDescription('Generate a new view file.')
             ->setHelp('This command allows you to generate new view file.')
             ->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $bladeFileName = $name.'.blade.php';

        if (!file_exists("views/$bladeFileName")) {
            shell_exec("echo blade > views/$bladeFileName");

file_put_contents("views/$bladeFileName", "@extends('layouts.app')
@section('content')
    <main>

        {{-- Silence is golden. --}}

    </main>
@endsection");
            
            echo "\n";
            echo "\033[0;32mView created successfully on 'views/$bladeFileName'\033[1;37m";
            echo "\n";

        } else {
            echo "\n";
            echo "\033[0;31mView Already Exists.\033[1;37m";
            echo "\n";
        }
        return Command::SUCCESS;
    }
}