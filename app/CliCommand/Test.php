<?php namespace Application\CliCommand;


use Zenit\Bundle\Zuul\Component\RoleManager\Component\RoleManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zenit\Bundle\Mission\Component\Cli\CliModule;

class Test extends CliModule{
	protected function configure(){
		$this->setName('test');
	}

	protected function execute(InputInterface $input, OutputInterface $output){
		$roles = RoleManager::Service()->resolveGroups('admin');
		print_r($roles);
	}
}