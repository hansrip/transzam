<?php

/**
 * sfBasePhpunitUnitTestSuite is the super class for all unit
 * suites using PHPUnit.
 *
 * @package    sfPhpunitPlugin
 * @subpackage lib
 * @author     Maksim Kotlyar <mkotlar@ukr.net>
 */
class sfBasePhpunitTestSuite 
  extends PHPUnit_Framework_TestSuite
  implements sfPhpunitFixtureAggregator
{  
	/**
	 * 
	 * @var sfProjectConfiguration
	 */
  protected static $_configuration;
  
  /**
   * 
   * @var sfPhpunitFixture
   */
  protected $_fixture;
  
  public static function setProjectConfiguration(sfProjectConfiguration $config)
  {
  	self::$_configuration = $config;
  }
  
  /**
   * @throws Exceptino if the sfProjectConfiguration instance was not set previously
   * 
   * @return sfProjectConfiguration
   */
  public static function getProjectConfiguration()
  {
    if (!self::$_configuration) {
      throw new Exception('Cannot create context. The project configuration was not set before.');
    }
    
    return self::$_configuration;
  }
  
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
  
  /**
   * Recreate your database structure.
   * 
   * @return void
   */
  protected function _setupDatabaseSchema()
  {
    $this->_setupContext();
  	
  	$env = sfContext::getInstance()->getConfiguration()->getEnvironment();
  	chdir(sfConfig::get('sf_root_dir'));
    
    $cmd = 'symfony propel:insert-sql --no-confirmation --env='.$env;
    shell_exec($cmd);
  }
  
  /**
   * build new sfContext
   * 
   * @return void
   */
  protected function _setupContext($name = null)
  {
  	if (!sfContext::hasInstance($name)) {
  		if (!self::$_configuration) {
  			throw new Exception('Cannot create context. The project configuration was not set before.');
  		}
  		
  	  sfContext::createInstance(self::$_configuration, $name);
  	}
  }
  
  public function getPackageFixtureDir()
  {
    return dirname($this->getOwnFixtureDir());
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