Joomla Console - Capistrano Plugin
===============================

This is a simple wrapper command for Capistrano projects used in conjuction with the  Joomlatools [Joomla Console](https://github.com/joomlatools/joomla-console).

The plugin adds a `capistrano:deply` command which you can use to
quickly deploy any previously configured project to your servers.

Installation
------------

* Run the following command 

	`$ joomla plugin:install joomlatools/joomla-console-  capistrano-plugin`

* Verify that the plugin is available: 

	`$ joomla plugin:list`

* You can now deploy an existing Capistrano project by: 

	`$ joomla capistrano:deploy sitenname`

* If you don't have an existing Capistrano project set up, the plugin will create one for you. Please refer to the getting started instructions as to how to configure this:
[http://capistranorb.com/documentation/getting-started/installation/](http://capistranorb.com/documentation/getting-started/installation4)

* For available options, run

   `$ joomla help capistrano:deploy`

Writing your own plugin
-----------------------

It's very easy to add custom commands to the tool. We recommended installing this plugin on your local setup and then starting off from there. You can find a step-by-step description in [our developer documentation](http://developer.joomlatools.com/tools/console/plugins.html#creating-custom-plugins).

## Requirements

* Composer
* [Joomla Console](https://github.com/joomlatools/joomla-console) >= 1.3

## Contributing

Fork the project, create a feature branch, and send us a pull request.

## Authors

See the list of [contributors](https://github.com/joomlatools/joomla-console-backup-plugin/contributors).

## License

The `joomlatools/joomla-console-backup` plugin is licensed under the MPL v2 license - see the LICENSE file for details.
