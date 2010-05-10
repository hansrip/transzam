<?php
/**
 * Task for creating functional test files for PHPUnit testing
 *
 * @package    sfPhpunitPlugin
 * @subpackage task
 *
 * @author     Frank Stelzer <dev@frankstelzer.de>
 * @author     Maksim Kotlyar <mkotlar@ukr.net>
 */
class sfPhpunitCreateFunctionalTestTask extends sfBasePhpunitCreateTask
{
	/**
	 * @see sfTask
	 */
	protected function configure()
	{
		parent::configure();
	  
	  $this->addArguments(array(
			new sfCommandArgument('application', sfCommandArgument::REQUIRED, 'Application that will be used to load configuration before running tests'),
			new sfCommandArgument('module', sfCommandArgument::REQUIRED, 'Module which should be tested'),
		));

		$this->addOptions(array(
			new sfCommandOption('env', 'e', sfCommandOption::PARAMETER_REQUIRED, 'Environment that will be used to load configuration before running tests', 'test'),
		));

		$this->namespace = 'phpunit';
		$this->name = 'create-functional';
		$this->briefDescription = 'Creates a functional test class of a module for PHPUnit testing';

		$this->detailedDescription = <<<EOF
The [phpunit:create-functional] task creates a functional test class of a module for PHPUnit testing
EOF;
	}

	/**
	 * @see sfTask
	 */
	protected function execute($arguments = array(), $options = array())
	{
	  parent::execute($arguments,$options);
	  
	  $this->checkAppExists($arguments['application']);
	  $this->checkModuleExists($arguments['application'],$arguments['module']);
	  
	  $this->_runInitTask();
    
    $this->_createClass(
      'functionals', 
      'functional/BasePhpunitFunctionalTestCase.tpl',
      array('className' => 'BasePhpunitFunctionalTestCase'));
		$this->_createDir(
		  $dir = sfConfig::get('sf_test_dir').'/phpunit/functionals/'.$arguments['application']);
		
		$this->_createClass(
		  'functionals/'.$arguments['application'], 
		  'functional/PhpunitFunctionalTestCase.tpl',
		  array(
        'className' => $arguments['module'].'ActionsTestCase',
        'parentName' => 'BasePhpunitFunctionalTestCase',
        'moduleName' => $arguments['module'],
        'application' => $arguments['application']));
		
		$this->_runInitTask();
	}
}