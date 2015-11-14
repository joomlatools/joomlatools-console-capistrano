Joomla Console - Capistrano Plugin
===============================

This is a simple wrapper command for Capistrano projects used in conjuction with the  Joomlatools [Joomla Console](https://github.com/joomlatools/joomla-console).

The plugin adds a `capistrano:deploy` command which you can use to
quickly deploy any previously configured project to your servers.

Installation
------------

* Run the following command 

	`$ joomla plugin:install joomlatools/joomla-console-capistrano`

* Verify that the plugin is available: 

	`$ joomla plugin:list`

* You can now deploy an existing Capistrano project by: 

	`$ joomla capistrano:deploy sitename`

* If you don't have an existing Capistrano project set up, the plugin will create one for you. Please refer to the getting started instructions as to how to configure this:
[http://capistranorb.com/documentation/getting-started/installation/](http://capistranorb.com/documentation/getting-started/installation4)

* For available options, run

   `$ joomla help capistrano:deploy`

Requirements
------------

In order for Capistrano to work you must have the following:

* Configured your remote machine(s) to work with Capistrano: [http://capistranorb.com/documentation/getting-started/authentication-and-authorisation/](http://capistranorb.com/documentation/getting-started/authentication-and-authorisation/)
* SSH access between both your local vagrant box and your remote server via the deploy user account
* SSH access between your local vagrant box and your GitHub account
* A Github repository that has been cloned in your joomla-vagrant box from this point forward called your 'project'

Capistrano deploys your project into a symlinked current/ directory on your server, so you'll need to set your document root to that folder via symlinks once again.

On your remote machine you will need the following installed:

* Ruby >= 1.9

Required Gems:

* capistrano (> 3.1.0)
* capistrano-composer

These can be installed manually with `gem install <gem name>`.

Initialisation
--------------

In order convert your project into a Capistrano enabled project issue the following command via vagrant terminal:

`$ joomla capistrano:deploy sitename`

replacing sitename with the name of your local project. 

If your project is already configured to work with Capistrano, then you can capify your project to any preconfigured environment via the following command:

`$ joomla capistrano:deploy sitename -e staging`

replacing staging with the any preconfigured environment found within /config/deploy

However should no Capistrano project be found then a new Capistrano project will be created.

Configuration
-------------

Initialising your Capistrano project will provide you with two base configuration files/ environments (production and staging) that you can configure.

Configuration settings that are generic between these two environments can be made within: 

* config/deploy/deploy.rb

Such generic settings could be your application name and the git repository you will use: 

```
set :application, "Capistrano"

set :repo_url, "git@github.com:joomlatools/joomla-console-capistrano.git"
```

Environment specific details, should be made in the following files:

* config/deploy/production.rb 
* config/deploy/staging.rb 

And example configuration is given below: 

```
set :stage_url, "http://www.example.com"
server "XXX.XXX.XX.XXX", 
user: "SSHUSER", roles: %w{web app db}
set :deploy_to, "/deploy/to/path"
set :branch, "master"
```

Capistrano is really configurable! To see a complete list of options please visit the following page: 
[http://capistranorb.com/documentation/getting-started/configuration/](http://capistranorb.com/documentation/getting-started/configuration/)

Should you need to connect to any further environments simply copy one of these environment config/deploy/*.rb files, name appropriately and configure to your needs.

.gitignore 
----------

Initialising Capistrano is going to add two folders to your local project:

* /.capistrano
* /config 

and one file in the root of your project:

* Capfile

You will want to add both files and folders to your .gitignore to avoid committing sensitive information to your repository.

Usage 
-----

Once your local Capistrano project is configured and you can easily deploy your project via the following command:

`$ joomla capistrano:deploy sitename -e staging`

or

`$ joomla capistrano:deploy sitename -e production`

For a complete list of options, run:

`$ joomla help capistrano:deploy`

## Contributing

The `joomlatools/joomla-console-capistrano` plugin is an open source, community-driven project. Contributions are welcome from everyone. We have [contributing guidelines](CONTRIBUTING.md) to help you get started.

## Contributors

See the list of [contributors](https://github.com/joomlatools/joomla-console-capistrano/contributors).

## License 

The `joomlatools/joomla-console-capistrano` plugin is free and open-source software licensed under the [MPLv2 license](LICENSE.txt).

## Community

Keep track of development and community news.

* Follow [@joomlatoolsdev on Twitter](https://twitter.com/joomlatoolsdev)
* Join [joomlatools/dev on Gitter](http://gitter.im/joomlatools/dev)
* Read and subscribe to the [Joomlatools Developer Blog](https://develeoper.joomlatools.com/blog/)
* Subscribe to the [Joomlatools Newsletter](http://www.joomlatools.com/newsletter)
