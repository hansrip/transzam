<?php

/**
 * sfBasePhpunitFunctionalTestCase is the super class for all functional
 * tests using PHPUnit.
 * The "getBrowser" method provides the current functional test/browser
 * instance of symfony and you can do anything with it you are used from
 * the normal lime based tests.
 *
 * @package    sfPhpunitPlugin
 * @subpackage testcase
 * @author     Frank Stelzer <dev@frankstelzer.de>
 */
abstract class sfBasePhpunitFunctionalTestCase extends sfBasePhpunitTestCase
{
	/**
	 * The sfBrowser instance
	 *
	 * @var sfBrowser
	 */
	private $testBrowser;
	
	 /**
   * The sfContext instance
   *
   * @var sfContext
   */
  private $context = null;
	
  /**
   * setUp method for PHPUnit
   *
   */
  public function setUp()
  {
    // first we need the context and autoloading
    $this->initializeContext();

    // autoloading ready, continue
    $this->testBrowser = new sfTestFunctional(new sfBrowser(), new sfPhpunitTest($this));

    parent::setUp();
  }

	/**
	 * Returns the sfBrowser instance
	 *
	 * @return sfBrowser
	 */
	public function getBrowser()
	{
		return $this->testBrowser;
	}
	
  /**
   * Returns if the test should be run in debug mode
   *
   * @return bool
   */
  protected function isDebug()
  {
    return true;
  }

	/*
	 * Returns sfContext instance
	 *
	 * @return sfContext
	 */
	protected function getContext()
	{
		if(!$this->context)
		{
			$this->context = sfContext::getInstance();
		}

		return $this->context;
	}
	
  /**
   * Intializes the context for this test
   *
   */
  private function initializeContext()
  {
    // only initialize the context one time
    if(!$this->context)
    {
      $configuration = ProjectConfiguration::getApplicationConfiguration($this->getApplication(), $this->getEnvironment(), $this->isDebug());
      sfContext::createInstance($configuration);

      // remove all cache
      sfToolkit::clearDirectory(sfConfig::get('sf_app_cache_dir'));
    }
  }
}