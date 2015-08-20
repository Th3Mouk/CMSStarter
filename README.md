CMS Starter
==========

Project ready to deploy, based on the top of [Symfony2][2] and [Sonata Project][1] using Th3Mouk extends bundle.

This project aims to simplify the use of Sonata CMS for developers and future users, trying to not alter the original flexibility, and to give them new basic tools.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b2da9e3d-2b18-4156-b703-c2915d7599a0/mini.png)](https://insight.sensiolabs.com/projects/b2da9e3d-2b18-4156-b703-c2915d7599a0) [![Latest Stable Version](https://poser.pugx.org/th3mouk/cms-starter/v/stable.svg)](https://packagist.org/packages/th3mouk/cms-starter) [![Total Downloads](https://poser.pugx.org/th3mouk/cms-starter/downloads.svg)](https://packagist.org/packages/th3mouk/cms-starter) [![Latest Unstable Version](https://poser.pugx.org/th3mouk/cms-starter/v/unstable.svg)](https://packagist.org/packages/th3mouk/cms-starter) [![License](https://poser.pugx.org/th3mouk/cms-starter/license.svg)](https://packagist.org/packages/th3mouk/cms-starter)


## Installation

### Via Composer

Go into your project's folder :

``` bash
# Example of user's folder
cd ~/projects
```

Now tell composer to create and download the project:

``` bash
$ composer create-project th3mouk/cms-starter my_project_name
```
Composer will install the project and his dependencies.

__The project is now deployed in your folder.__


### Load Fixtures Datas

The project comes with lots of examples fixtures.

This allows to create user, medias, CMS pages, menu items... and many mores.

To adapt this part to your needs you need referer to the following docs:

* [DoctrineFixturesBundle](http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html)
* [How to Create a Console Command](http://symfony.com/doc/master/cookbook/console/console_command.html)

The project will not work without executing this command:

``` bash
php bin/load_data.php
```

She allows to reflate all the commands present in the file `bin/load_data.php`

It's also a way to reload your new datas during phases of development.



### Finally

__That's all folks !__

Your project is now fully installed, and functional.

## Update CMSStarter

Only one solution is advised to easily update your project: `cherry pick`

You need to have a remote on your subversion, directly on this repository.
Call it maybe (=D), updates and checkout the master branch.

When there is new releases you have the choice : merging or cherry picking into your project.

## Configuration

### CKEditor

A default configuration with SonataMedia exists in `app/config/config.yml`, delete it to implement your own, like with [FMElfinderBundle](https://github.com/helios-ag/FMElfinderBundle#ckeditor-integration) integration.

## Extend me

### Bundle pack

A fix, a feature, typo or missing docs ?

Submit it and be part of CMS Starter !

This project use:

* [CMSCoreBundle](https://github.com/Th3Mouk/CMSCoreBundle) (The core provide default configuration of CMS and basic dependencies)
* [CMSPageBundle](https://github.com/Th3Mouk/CMSPageBundle) (Extend of [SonataPageBundle](https://github.com/sonata-project/SonataPageBundle))
* [Id4vMenuBundle](https://github.com/Id4v/MenuBundle) (Manageable and customizable menu)


### Install Grunt modules

You must be familiar with [Grunt](http://gruntjs.com/) to add others modules and tasks.

``` bash
npm install
```

### Bower

You must be familiar with [Bower](http://bower.io/) to add dependencies

``` bash
bower install
```

#### Style

At each modification of the [LESS](http://lesscss.org/)/CSS, you need
to re-compile `starter.min.css` file.
 
Run:
``` bash
grunt css
```

This command make 2 tasks in one: (compression and minimization)

__Beware__

This operation overwritte the `web/css/style.css` file.

You need to modify `Gruntfile.js` or LESS files in `app/Resources/public/less` to adapt behaviors on your need.

__LiveReload__

You can also run this task and use [LiveReload](http://livereload.com/) for reload browser pages instantly at each save of LESS file.

``` bash
grunt watch
```

This task run in background and recompile `starter.min.css` each time you save a modification of a LESS file,
in this folder `app/Resources/public/less/`.
Under the hood `grunt watch` launch `grunt css`.

#### Javascripts

In the same way, this command
``` bash
grunt js
```

Allow to compress and minimize all the javascripts in `starter.min.js`.

#### Tweaks

All modifications, and certainly addition of stylesheets and scripts, can be made in the `Gruntfile.js`.


[1]:  https://sonata-project.org/
[2]:  http://symfony.com/
