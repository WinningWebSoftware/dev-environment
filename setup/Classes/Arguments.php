<?php

declare(strict_types=1);

namespace DevEnvironment\Classes;

use DevEnvironment\Enums\ConsoleStyles;
use Exception;

class Arguments
{
    private array $arguments;

    public function __construct(array $arguments)
    {
        unset($arguments[0]);
        $arguments = array_values($arguments);

        try {
            $this->setArguments($this->parseArguments($arguments));
        } catch (Exception $e) {
            Console::writeLine($e->getMessage(), ConsoleStyles::RED);
            exit(1);
        }
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function setArguments(array $arguments): void
    {
        $this->arguments = $arguments;
    }

    public static function contains()
    {

    }

    /**
     * @param array $arguments
     * @return array
     *
     * @throws Exception
     */
    private static function parseArguments(array $arguments): array
    {
        // TODO: This method should allow flags such as "--help" and "--version" to be parsed.
        $parsedArguments = [];

        foreach($arguments as $arg) {
            if (str_contains($arg, "=")) {
                $explodedArgument = explode("=", $arg);
                $parsedArguments[$explodedArgument[0]] = $explodedArgument[1];
            } else {
                throw new Exception("Arguments are not presented in the correct format.");
            }
        }

        return $parsedArguments;
    }
}