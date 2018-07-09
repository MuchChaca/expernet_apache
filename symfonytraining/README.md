# Symfony

## Docs
* [create a sample page](https://symfony.com/doc/current/page_creation.html)


## New project
Use the following alias:
```bash
symfony-new app_name
# Then change directory
cd $_
```

## Start the new project
Use the following alias:
```bash
symfony-start
```

## Install annotations
```bash
composer require annotations
```

## Install ``twig`` - Template engine
```bash
composer require twig
```

## Install generator
```bash
composer require symfony/maker-bundle --dev
```

## Install ORM 
:question:
```bash
composer require orm
```

## Install debug bar
```bash
composer require symfony/profiler-pack
```

## Create a controller
### Symfony 3
* ``extends Controller``
* ``@Route`` https://symfony.com/doc/current/routing.html
* ``@Method``
* public