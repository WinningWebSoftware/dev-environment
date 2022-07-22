<?php

declare(strict_types=1);

namespace DevEnvironment\Helpers;

class StringHelper
{
    public static function getProjectNameFromPath(string $rootPath): string
    {
        $projectNameArray = explode("/", $rootPath);
        return end($projectNameArray);
    }
}