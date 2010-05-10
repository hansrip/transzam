<?php
require_once dirname(__FILE__).'/../{parentName}.php';

/**
* Functional test class for module "{moduleName}" of application "{application}".
*
* Call this test with:
* symfony phpunit:runtest {application} functionals/{application}/{className}.php
*/
class {className} extends {parentName}
{
	/**
	* Returns application name for this test case. Needed for context creation.
	*/
	public function getApplication()
	{
		return '{application}';
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
  		get('/{moduleName}/index')->
  
  		with('request')->begin()->
  		isParameter('module', '{moduleName}')->
  		isParameter('action', 'index')->
  		end()->
  
  		with('response')->begin()->
  		isStatusCode(200)->
  		checkElement('body', '!/This is a temporary page/')->
  		end();
	}
}