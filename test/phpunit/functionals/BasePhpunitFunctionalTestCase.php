<?php

/**
* Base test class for all functional tests with PHPUnit
*/
abstract class BasePhpunitFunctionalTestCase extends sfBasePhpunitFunctionalTestCase
{
	
	/**
	* Dev hook, which is called in the setUp process
	*/
	protected function _start()
	{
		// your custom code for pre-testing here	
	}

	/**
	* Dev hook, which is called in the tearDown process
	*/
	protected function _end()
	{
		// your custom code for post-testing here		
	}
	
}