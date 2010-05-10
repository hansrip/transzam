<?php

/**
 * sfBasePhpunitUnitTestCase is the super class for all unit
 * tests using PHPUnit.
 *
 * @package    sfPhpunitPlugin
 * @subpackage testcase
 * @author     Frank Stelzer <dev@frankstelzer.de>
 */
abstract class sfBasePhpunitTestCase 
  extends PHPUnit_Framework_TestCase
  implements sfPhpunitFixtureAggregator
{
	/**
	 * 
	 * @var sfPhpunitFixture
	 */
	protected $_fixture;
	
	/**
	 * Dev hook for custom "setUp" stuff
	 * Overwrite it in your test class, if you have to execute stuff before a test is called.
	 */
	protected function _start()
	{
	}

	/**
	 * Dev hook for custom "tearDown" stuff
	 * Overwrite it in your test class, if you have to execute stuff after a test is called.
	 */
	protected function _end()
	{
	}

	/**
	 * Please do not touch this method and use _start directly!
	 */
	public function setUp()
	{
		$this->_start();
	}

	/**
	 * Please do not touch this method and use _end directly!
	 */
	public function tearDown()
	{
		$this->_end();
	}
	
	public function getPackageFixtureDir()
	{
	  $reflection = new ReflectionClass($this);
    $path = dirname($reflection->getFileName());
    $path = substr_replace($path, 'fixtures/', strpos($path, 'phpunit/') + 8, 0);
    
    return $path;
	}
	
	public function getOwnFixtureDir()
	{
	  $reflection = new ReflectionClass($this);
    $path = str_replace('.php', '', $reflection->getFileName());
    $path = substr_replace($path, 'fixtures/', strpos($path, 'phpunit/') + 8, 0);
    
    return $path;
	}
	
	public function getCommonFixtureDir()
	{
	  return sfConfig::get('sf_test_dir').'/phpunit/fixtures/common';
	}
	
  public function getSymfonyFixtureDir()
  {
    return sfConfig::get('sf_data_dir').'/fixtures';
  }
	
  /**
   * 
   * 
   * @return sfPhpunitFixture|mixed
   */
  protected function fixture($id = null)
  {
    if (!$this->_fixture) $this->_initFixture();

    return is_null($id) ? $this->_fixture : $this->_fixture->get($id); 
  }
	
	protected function _initFixture(array $options = array())
	{
	  $this->_fixture = sfPhpunitFixture::build($this, $options);
	}
}