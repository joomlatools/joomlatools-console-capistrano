<?php
/**
 * @copyright	Copyright (C) 2007 - 2014 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		Mozilla Public License, version 2.0
 * @link		http://github.com/joomlatools/joomla-console for the canonical source repository
 */

namespace Joomlatools\Console\Command;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Joomlatools\Console\Command\Site\AbstractSite;

class CapistranoDeploy extends AbstractSite
{
    protected function configure()
    {
        parent::configure();

        $this
            ->setName('capistrano:deploy')
            ->setDescription('Deploy an already configured capistrano project')
            ->addOption(
                'environment',
                'e',
                InputOption::VALUE_OPTIONAL,
                "Which environment would you like to deploy to",
                'staging'
            )
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        if(!file_exists($this->target_dir . '/Capfile'))
        {
            `cap install`;

            `mkdir .capistrano`;

            `touch .capistrano/metrics`;

            `echo "none" > .capistrano/metrics`;

            $output->writeln('<info>Created blank Cap project</info>');
            $output->writeln('<comment>For installation and configuration help, please refer to the documentation:</comment>');
            $output->writeln('http://capistranorb.com/documentation/getting-started/installation/');

            return;
        }
        else
        {
            $result = exec('cd ' .$this->target_dir. '; cap ' . $input->getOption('environment') . ' deploy');
            $output->writeln($result);
        }
    }
}