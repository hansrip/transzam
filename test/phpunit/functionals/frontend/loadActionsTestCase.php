<?php
require_once dirname(__FILE__).'/../BasePhpunitFunctionalTestCase.php';

/**
* Functional test class for module "load" of application "frontend".
*
* Call this test with:
* symfony phpunit:runtest frontend functionals/frontend/loadActionsTestCase.php
*/
class loadActionsTestCase extends BasePhpunitFunctionalTestCase
{
	/**
	* Returns application name for this test case. Needed for context creation.
	*/
	public function getApplication()
	{
		return 'frontend';
	}

	/**
	* Returns environment name for this test case. Needed for context creation.
	*/
	public function getEnvironment()
	{
		return 'test';
	}

	/**
	* First test method
	*/
	public function test1()
	{
		$browser = $this->getBrowser();
		$browser->
  		get('/load/index')->
  
  		with('request')->begin()->
  		isParameter('module', 'load')->
  		isParameter('action', 'index')->
  		end()->
  
  		with('response')->begin()->
  		isStatusCode(200)->
  		checkElement('body', '!/This is a temporary page/')->
  		end();
	}
}