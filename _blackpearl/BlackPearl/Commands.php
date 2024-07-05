<?php

use Dotenv\Dotenv;
use Framework\BlackPearl\JSON;

echo "\n";
echo "-- \033[0;36mBlackPearl CLI\033[1;37m --";
echo "\n";
echo "\n";
echo "by \033[1;35mMark Jason Espelita\033[1;37m";
echo "\n";
echo "\n";
echo "Type \033[1;30m--help\033[1;37m for Help.";
echo "\n";
echo "\n";

while (true) {
    echo "\n";
    echo "Run: ";
    $command = fgets(STDIN);
    $c = trim($command);

    // --help

    if ($c === '--help') {
        echo "\n";
        echo "\033[0;32mmake:view\033[0;33m --------- Make a new blade template file. \n";
        echo "\033[0;32mmake:controller\033[0;33m --- Make a new controller. \n";
        echo "\033[0;32mmake:model\033[0;33m -------- Make a new model and migration. \n";
        echo "\033[0;32mdb:migrate\033[0;33m -------- Migrate database tables. \n";
        echo "\n\033[1;37m";

        // make:view

    } elseif($c === 'make:view') {
        echo "View Name: ";
        $command = fgets(STDIN);
        $c = trim($command);
        $bladeFileName = $c.'.blade.php';

        if (!file_exists("views/$bladeFileName")) {
            shell_exec("echo blade > views/$bladeFileName");

file_put_contents("views/$bladeFileName", "@extends('layouts.app')
@section('content')
    <main>

        {{-- Silence is golden. --}}

    </main>
@endsection");
            
            echo "\n";
            echo "\033[0;32mView created successfully on views/$bladeFileName\033[1;37m";
            echo "\n";

        } else {
            echo "\n";
            echo "\033[0;31mView Already Exists.\033[1;37m";
            echo "\n";
        }

        // make:controller

    } elseif($c === 'make:controller') {
        echo "Controller Name: ";
        $command = fgets(STDIN);
        $c = trim($command);
        // File name and content
        $controllerName = $c.'.php';

        if (!file_exists('controllers/'.$c.'.php')) {
            shell_exec("echo php > controllers/$controllerName");

// add model

file_put_contents("controllers/$controllerName", "<?php

namespace App\Controller;

class $c
{
    public function index()
    {
        // ...
    }
}");

            // update the autoload
            file_put_contents('_blackpearl/autoload.php', "\nrequire './controllers/$controllerName';",FILE_APPEND | LOCK_EX);

            echo "\n";
            echo "\033[0;32mController created successfully on 'controllers/$controllerName\033[1;37m'";
            echo "\n";
        } else {
            echo "\n";
            echo "\033[0;31mController Already Exists.\033[1;37m";
            echo "\n";
        }

        // db:migrate

    } elseif($c === 'make:model') {
        echo "Model Name: ";
        $command = fgets(STDIN);
        $c = trim($command);
        // File name and content
        $modelName = $c.'.php';
        // lowercase
        $lowerModelName = strtolower($c);

        if (!file_exists('models/'.$c.'.php')) {
            shell_exec("echo php > models/$modelName");

// add model

file_put_contents("models/$modelName", "<?php

namespace Framework\Models;

use Illuminate\Database\Eloquent\Model;

class $c extends Model
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
            file_put_contents('_blackpearl/autoload.php', "\nrequire './models/$modelName';",FILE_APPEND | LOCK_EX);

            echo "\n";
            echo "\033[0;32mModel created successfully on 'models/$modelName\033[1;37m'.";
            echo "\n";
            echo "\033[0;32mdatabase/migrations/tables.php updated successfully.\033[1;37m";
            echo "\n";
        } else {
            echo "\n";
            echo "\033[0;31mModel Already Exists.\033[1;37m";
            echo "\n";
        }

    } elseif($c === 'db:migrate') {

        require 'vendor/autoload.php';

        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
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

    } elseif($c === 'exit') {
        echo "\033[0;32mGoodbye :)\033[1;37m";
        break;
    } else {
        echo "\033[0;31mINVALID COMMAND!\033[1;37m";
    }
}
