<?php

/**
 * 
 * Class for managing dbunit fixtures.
 *
 * @package    sfPhpunitPlugin
 * @subpackage fixture
 * @author     Maksim Kotlyar <mkotlar@ukr.net>
 */
class sfPhpunitFixturePropel extends sfPhpunitFixture
{
	/**
	 * @var sfPhpunitPropelData
	 */
  protected $_data;
  
  /**
   * 
   * @var array
   */
  protected $_options = array(
    'fixture_ext' => '.propel.yml',
    'connection' => null);
  
  /**
   * (non-PHPdoc)
   * @see plugins/sfPhpunitPlugin/lib/fixture/sfPhpunitFixtureAbstract#load($file, $fixture_type, $clean_before)
   */
  public function load($file = null, $fixture_type = self::OWN)
  {
    $files = $this->getFiles($file, $fixture_type);
    if (empty($files)) {
      $path = is_null($file) ? 
        $this->getDir($fixture_type) : $this->getDir($fixture_type).'/'.$file.$this->_getExt();
      throw new Exception('There is nothing to load under the path '.$path);
    }
    
    $data = $this->_getDataLoader();
    $connection ? $data->loadData($files, $connection) : $data->loadData($files);

    return $this;
  }
  
  /**
   * (non-PHPdoc)
   * @see plugins/sfPhpunitPlugin/lib/fixture/sfPhpunitFixtureAbstract#clean()
   */
  public function clean()
  {
    $connection = Propel::getConnection();
    
    $connection->exec("SET FOREIGN_KEY_CHECKS = 0;");
    
    $query = $connection->prepare('SHOW TABLES');
    $query->execute();
    while($table = $query->fetchColumn()) {
      $connection->exec("TRUNCATE TABLE `{$table}`");
    }
    
    $connection->exec("SET FOREIGN_KEY_CHECKS = 1;");
    
    $this->_getDataLoader()->cleanObjects();
    
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
   * @return sfPhpunitPropelData
   */
  protected function _getDataLoader()
  {
  	if (!$this->_data) $this->_data = new sfPhpunitPropelData();
  	
  	return $this->_data;
  }
}