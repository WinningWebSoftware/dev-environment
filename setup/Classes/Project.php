<?php

declare(strict_types=1);

namespace DevEnvironment\Classes;

class Project
{
    private string $name;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setNameFromPath(string $path): void
    {
        $name = explode("/", $path);
        $this->setName(end($name));
    }
}