<?php

declare(strict_types=1);

namespace DevEnvironment\Classes;

use DevEnvironment\Enums\ConsoleStyles;

class Console
{
    public static function writeLine(string $message, string $color): void
    {
        echo "$color" . $message . ConsoleStyles::RESET . "\n";
    }
}