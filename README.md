# Portable PHP Development Environment

This project contains a complete development environment for PHP, with the
following services:

- Nginx
- PHP
- MySQL
- Composer
- Node & NPM

## How to use

To create a project using this environment, you are required to have installed
on your system:

- PHP
- Composer
- Docker Desktop

To create a new project that utilises this environment you can use the following 
command:

```
composer create-project winningsoftware/dev-environment project-name
```

This will create a new directory called `project-name` inside your current
directory. Move into your project directory and run setup:

```
cd project-name && composer install
```

As of version 1.1.0, you can now run the following command to automatically update your
`docker-compose.yml` file:

```
php setup.php
```

This will update your `docker-compose.yml` file to automatically name your container images
based on your project name. If you would like to specify a different name, you can simply append
this to the command:

```
php setup.php project_name
```

You can also install Laravel using the same command, specifying a `type`:

```
php setup.php project_name type=laravel
```

This will install a new Laravel project in the app directory.

If you do not wish to use the setup script, you can manually update your `docker-compose.yml` 
file. Open the file and do a find and replace for`project_name` and replace it with your 
prefix/project name. This prevents container name conflicts if you are using this dev environment 
for multiple projects.

In order to create your environment and build your containers run the following
command:

```
docker-compose up --build -d
```

This will create images for each of our separate services and then boot
up some containers.

Your application code lives inside the `app` directory.

To test that everything is working correctly, add a file at `app/index.php`
and then navigate to http://localhost in your browser - you should see the 
output of your file.

### Running Composer/NPM Commands
Naturally, when running commands, you would `cd` into the directory you wish
to run commands in and just use `composer init`, `npm install` etc.

In order to run commands inside the containers, use the following format:

```
docker-compose run --rm composer init
docker-compose run --rm node npm install
```

This makes sure that commands are run inside the container, so it doesn't matter
which version of NPM a developer has installed on their machine for example.

#### PHP/Composer
If you are missing PHP or Composer, you can use Homebrew on MacOS to install
both of these - on Windows I'd recommend using Laragon to manage your PHP
versions and the Windows installer for Composer. Docker Desktop has an installer
on both MacOS and Windows. Follow the Docker docs for installation instructions
for Linux.