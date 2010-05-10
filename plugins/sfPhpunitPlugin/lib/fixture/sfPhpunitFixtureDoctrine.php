<?php

/**
 *
 * Class for managing doctrine fixtures.
 *
 * @package    sfPhpunitPlugin
 * @subpackage fixture
 * @author     Maksim Kotlyar <mkotlar@ukr.net>
 */
class sfPhpunitFixtureDoctrine extends sfPhpunitFixture
{
  /**
   * @var sfPhpunitDoctrineData
   */
  protected $_data;
  
  /**
   *
   * @var array
   */
  protected $_options = array(
    'fixture_ext' => '.doctrine.yml'
  );

  /**
   * (non-PHPdoc)
   * @see plugins/sfPhpunitPlugin/lib/fixture/sfPhpunitFixtureAbstract#load($file, $fixture_type, $clean_before)
   */
  public function load($file = null, $fixture_type = self::OWN)
  {
    $path = $this->getDir($fixture_type);
    $ext = $this->_getOption('fixture_ext');

    $files = $this->getFiles($file, $fixture_type);
    if (empty($files)) {
      $path = is_null($file) ?
      $this->getDir($fixture_type) : $this->getDir($fixture_type).'/'.$file.$this->_getExt();
      throw new Exception('There is nothing to load under the path '.$path);
    }
    
    foreach ($files as $file) {
      $this->_getDataLoader()->setFormat('yml');
      $this->_getDataLoader()->setDirectory($file);
      $this->_getDataLoader()->doImport(true);
    }

    return $this;
  }

  /**
   * (non-PHPdoc)
   * @see plugins/sfPhpunitPlugin/lib/fixture/sfPhpunitFixtureAbstract#clean()
   */
  public function clean()
  {
    $this->_getDataLoader()->cleanObjects();
   
    $rebuild = new sfDoctrineRebuildDbTask(new sfEventDispatcher, new sfFormatter);
    $rebuild->run(array(), array(
      'no-confirmation' => true,
      'application' => $this->_getApp(),
      'env' => $this->_getEnv()
    ));    
  
    return $this;
  }

  /** 
   * (non-PHPdoc)
   * @see plugins/sfPhpunitPlugin/lib/fixture/sfPhpunitFixtureAbstract#get($file, $fixture_type)
   */
  public function get($id)
  {
    return $this->_getDataLoader()->getObject($id);
  }
  
  /**
   * 
   * @return sfPhpunitDoctrineData
   */
  protected function _getDataLoader()
  {
    if (!$this->_data) {
      $this->_data = new sfPhpunitDoctrineData();
    }
    
    return $this->_data;
  }
}