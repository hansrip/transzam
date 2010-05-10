<?php

class {className} extends sfBasePhpunitTestSuite
{
	/**
	 * Dev hook for custom "setUp" stuff
	 */
	protected function _start()
	{
	  $this->_setupContext();
	  //$this->_setupDatabaseSchema();
	}

	/**
	 * Dev hook for custom "tearDown" stuff
	 */
	protected function _end()
	{
	}
}