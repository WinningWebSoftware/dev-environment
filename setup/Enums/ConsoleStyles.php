<?php

/**
 * Whilst I could have made use of PHP 8.1's dedicated Enumerators,
 * I wanted to keep this environment as accessible as possible, so
 * opted for a Class based approach.
 */

declare(strict_types=1);

namespace DevEnvironment\Enums;

class ConsoleStyles
{
    public const RED = "\e[31m";
    public const GREEN = "\e[32m";
    public const YELLOW = "\e[33m";
    public const BLUE = "\e[34m";
    public const MAGENTA = "\e[35m";
    public const CYAN = "\e[36m";
    public const RESET = "\e[0m";
}