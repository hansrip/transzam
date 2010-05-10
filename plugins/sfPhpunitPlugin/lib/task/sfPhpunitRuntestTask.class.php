<?php

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

/**
 * Symfony task that provide more flexable way to run tests.
 *
 * @package    sfPhpunitPlugin
 * @subpackage task

 * @author     Maksim Kotlyar <mkotlar@ukr.net>
 */
class sfPhpunitRuntestTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    $this->addArguments(array(
      new sfCommandArgument('application', sfCommandArgument::REQUIRED, 'Application that will be used to load configuration before running tests'),
      new sfCommandArgument('test', sfCommandArgument::OPTIONAL, 'Name of test to run', ''),
    ));

    $this->addOptions(array(
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'test'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'phpunit';
    $this->name             = 'runtest';
    $this->briefDescription = 'Runs PHPUnit tests';
    $this->detailedDescription = <<<EOF
The [phpunit:runtest|INFO] Allow you to run simple test or test from the directory or ofcourse all tests.

  [php symfony phpunit:runtest frontend foo|INFO] - run all test in the phpunit directory and all subdirectories.
  
  [php symfony phpunit:runtest frontend unit |INFO] - run all test in the /phpunit/unit directory.
  
  [php symfony phpunit:runtest frontend unit/* |INFO] - run all test in the /phpunit/unit directory and all subdirectories.
  
  [php symfony phpunit:runtest frontend unit/models/UserTest.php |INFO] - run a single UserTest.php test case.

EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {    
//    $initTask = new sfPhpunitInitTask($this->dispatcher, $this->formatter);
//    $initTask->run();
    chdir(sfConfig::get('sf_root_dir'));
    shell_exec('./symfony phpunit:init');
  	
  	$path = $arguments['test'];
    sfBasePhpunitTestSuite::setProjectConfiguration($this->configuration);
    
    $runner = new PHPUnit_TextUI_TestRunner();
    $runner->doRun(sfPhpunitSuiteLoader::factory($path)->getSuite());
  }
}