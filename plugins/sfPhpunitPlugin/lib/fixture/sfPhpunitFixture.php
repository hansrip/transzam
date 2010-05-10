<?php

/**
 *
 * Base fixture functionallity here.
 *
 * @package    sfPhpunitPlugin
 * @subpackage fixture
 * @author     Maksim Kotlyar <mkotlar@ukr.net>
 */
abstract class sfPhpunitFixture
{
  const
	  OWN = 'Own',
	  PACKAGE = 'Package',
	  COMMON = 'Common',
	  SYMFONY = 'Symfony';

  /**
   *
   * @var sfBasePhpunitTestCase
   */
  protected $_aggregator;

  /**
   * Example array('pdo_adapter', 'fixture_extension');
   *
   * @var array
   */
  protected $_requiredOptions = array('fixture_ext');

  protected $_options = array();

  public function __construct(sfPhpunitFixtureAggregator $case, array $options = array())
  {
    $this->_aggregator = $case;
    $this->_options = array_merge($this->_options, $options);

    foreach ($this->_requiredOptions as $opt) {
      if (!array_key_exists($opt, $this->_options)) {
        throw new Exception('The option `'.$opt.'` is requered');
      }
    }
  }

  /**
   * If you set a concret file do it without extension.
   * For changing default extension please use `fixture_ext` option.
   *
   * @param string $file A fixture file name. File shoud exist in the fixture_type directory.
   * @param string $fixture_type Where to search fixtures.
   * @param bool $clear_before Whether clear database before loading or not.
   *
   * @return sfPhpunitFixture
   */
  abstract public function load($file = null, $fixture_type = self::OWN);

  /**
   * Clean the database
   *
   * @return sfPhpunitFixture
   */
  abstract public function clean();

  /**
   * This method should used for returning spesific fixture loader data
   * Like object of dataset in dbunit extension
   *
   * @param string $file A fixture file name. File shoud exist in the fixture_type directory.
   * @param string $fixture_type Where to search fixtures.
   *
   * @return mixed
   */
  abstract public function get($id);

  /**
   * @see sfPhpunitFixture::getFixtureDir
   *
   * @return string
   */
  public function getDir($fixture_type = self::OWN)
  {
    return self::getFixtureDir($this->_aggregator, $fixture_type);
  }

  /**
   * return files that matched criteria.
   *
   * @return array
   */
  public function getFiles($file = null, $fixture_type = self::OWN)
  {
    $pattern = is_null($file) ? '*'.$this->_getExt() : $file.$this->_getExt();

    return sfFinder::type('file')->name($pattern)->maxdepth(0)->in($this->getDir($fixture_type));
  }
  
  /**
   * It's a magic method for minimuzing
   * 
   * You can use it in a following way:
   * 
   * getCONSTANT($file)
   * loadCONSTANT($file)
   * getDirCONSTANT()
   * getFilesCONSTANT($file)
   * 
   * @param string $name
   * @param array $args
   * 
   * @throws Exception if Invalid method name
   * @throws Exception if trying access not exist fixture level 
   * 
   * @return mixed
   */
  public function __call($name, $args)
  {
    if (false !== strstr($name, 'getDir')) {
      $method = 'getDir';
      $args[0] = $source = str_replace('getDir', '', $name);
    } else if (false !== strstr($name, 'load')) {
  		$method = 'load';
  		$args[1] = $source = str_replace('load', '', $name);
  	} else if (false !== strstr($name, 'getFiles')) {
  		$method = 'getFiles';
      $args[1] = $source = str_replace('getFiles', '', $name);
  	} else {
  		throw new Exception('Invalid method call '.__CLASS__.'::'.$name);
  	}
  	
  	$sources = array(self::OWN, self::PACKAGE, self::COMMON, self::SYMFONY);
  	if (!in_array($source, $sources)) {
  		throw new Exception('Invalid fixture source level. Allowed values `'.implode('`, `', $sources).'` but given `'.$source.'`');
  	}
  	
  	return call_user_func_array(array($this, $method), $args); 
  }

  protected function _getOption($name)
  {
    if (!array_key_exists($name, $this->_options)) {
      throw new Exception('The option `'.$name.'` does not exist');
    }
     
    return $this->_options[$name];
  }

  /**
   *
   * @return string
   */
  protected function _getExt()
  {
    return $this->_getOption('fixture_ext');
  }

  /**
   *
   * @return string
   */
  protected function _getEnv()
  {
    return sfContext::getInstance()->getConfiguration()->getEnvironment();
  }

  /**
   *
   * @return string
   */
  protected function _getApp()
  {
    return sfContext::getInstance()->getConfiguration()->getApplication();
  }
  
  /**
   * 
   * @param sfPhpunitFixtureAggregator $aggregator It's very important that it should one of the `sfPhpunitFixtureAggregator` childs interface
   * @param array $options
   * 
   * @throws Exception if the given aggregator does not implemented the base `sfPhpunitFixtureAggregator` interface 
   * @throws Exception if the concret `sfPhpunitFixtureAggregator` child's interface was not defined 
   * 
   * @return sfPhpunitFixture
   */
  public static function build($aggregator, array $options = array())
  {
  	$map = array(
  	  'sfPhpunitFixturePropel' => 'sfPhpunitFixturePropelAggregator',
  	  'sfPhpunitFixtureDoctrine' => 'sfPhpunitFixtureDoctrineAggregator',
  	  'sfPhpunitFixtureDbUnit' => 'sfPhpunitFixtureDbUnitAggregator');
  	
  	if (!$aggregator instanceof sfPhpunitFixtureAggregator) {
  		throw new Exception('For using fixtures from the testcase or suite `'.get_class($aggregator).'` you have to implement one of the following interfaces `'.implode('`, `', $map).'`');
  	}
  	
  	foreach ($map as $class => $agg_type) {
  		if ($aggregator instanceof $agg_type) return new $class($aggregator);
  	}
    
  	throw new Exception('It does not have any sence to implement `sfPhpunitFixtureAggregator` interface. Please check this once againg and implement its child\'s interfaces  `'.implode('`, `', $map).'`');
  }

  /**
   *
   * @param sfBasePhpunitTestCase $case
   * @param strign $type
   *
   * @throws Exception if the protected method for getting spesific fixture directory does not exist.
   *
   * @return strign
   */
  public static function getFixtureDir(sfPhpunitFixtureAggregator $aggregator, $type = self::OWN)
  {
    $getFixtureDir = 'get'.$type.'FixtureDir';
    if (!method_exists($aggregator, $getFixtureDir)) {
      throw new Exception('The static method `'.get_class($aggregator).'::'.$getFixtureDir.'` does not exist and so cannot be called');
    }
    
    $path = call_user_func(array($aggregator, $getFixtureDir));
    if (!file_exists($path)) {
      throw new Exception('The '.$type.' level fixture dir `'.$path.'` does not exist.');
    }

    return $path;
  }
}