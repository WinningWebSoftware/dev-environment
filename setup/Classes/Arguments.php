<?php

declare(strict_types=1);

namespace DevEnvironment\Classes;

class Arguments
{
    private array $arguments;

    public function __construct(array $arguments)
    {
        unset($arguments[0]);
        $this->setArguments(array_values($arguments));
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function setArguments(array $arguments): void
    {
        $this->arguments = $arguments;
    }
}