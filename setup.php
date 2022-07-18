<?php

unset($argv[0]);
$args = array_values($argv);
$projectName = "";

if (!count($args)) {
    $projectName = getProjectNameFromPath();
    updateDockerComposeConfig($projectName);
} else {
    if (count($args) > 2) {
        throw new Error("Too many arguments.");
    }

    if (count($args) === 1) {
        if (str_contains($args[0], "type=")) {
            $projectName = getProjectNameFromPath();
        } else {
            $projectName = $args[0];
        }
    } else {
        $typePosition = -1;
        $type = "";

        foreach($args as $arg) {
            if (str_contains($arg, "type=")) {
                var_dump($typePosition = array_search($arg, $args));
                $type = str_replace("type=", "", $arg);
            }
        }

        if ($typePosition === -1) {
            throw new Error("Incorrect arguments specified.");
        }

        $projectName = $typePosition ? $args[$typePosition - 1] : $args[$typePosition + 1];

        if ($type === "laravel") {
            shell_exec("composer create-project laravel/laravel app --prefer-dist");
        }
    }
}

updateDockerComposeConfig($projectName);

function updateDockerComposeConfig(string $projectName): void
{
    $dockerComposeConfigPath = dirname(__FILE__) . "/docker-compose.yml";
    $dockerComposeConfig = file_get_contents($dockerComposeConfigPath);
    $dockerComposeConfig = str_replace("project_name", $projectName, $dockerComposeConfig);
    file_put_contents($dockerComposeConfigPath, $dockerComposeConfig);
}

function getProjectNameFromPath(): string
{
    $projectNameArray = explode("/", dirname(__FILE__));
    return end($projectNameArray);
}