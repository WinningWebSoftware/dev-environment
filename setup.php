<?php

use DevEnvironment\Classes\Arguments;
use DevEnvironment\Classes\Console;
use DevEnvironment\Classes\Project;
use DevEnvironment\Enums\ConsoleStyles;

require_once __DIR__ . "/vendor/autoload.php";

$project = new Project();
$args = new Arguments($argv);

Console::writeLine("Welcome to the Dev Environment Setup Tool!", ConsoleStyles::GREEN);