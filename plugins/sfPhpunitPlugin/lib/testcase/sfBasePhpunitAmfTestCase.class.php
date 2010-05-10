<?php

/**
 * sfBasePhpunitAmfTestCase is the super class for all test that cover amf services
 * tests using PHPUnit.
 *
 * @package    sfPhpunitPlugin
 * @subpackage testcase
 * @author     Maksim Kotlyar <mkotlar@ukr.net>
 */
abstract class sfBasePhpunitAmfTestCase extends sfBasePhpunitTestCase
{
  protected $_defaultMapping = array();
	
	public function setUp()
  {
    $this->_setUpMapping();
  	parent::setUp();
  }
  
  public function tearDown()
  {
  	$this->_tearDownMapping();
  	parent::tearDown();
  }
  
  /**
   * Setup mapping
   * 
   * @return void
   */
  protected function _setUpMapping()
  {
  	$this->_defaultMapping = SabreAMF_ClassMapper::$maps;
  	
  	foreach ($this->_getMappedClasses() as $flashClass => $phpClass) {
  		SabreAMF_ClassMapper::registerClass($flashClass, $phpClass);
  	}
  }
  
  protected function _tearDownMapping()
  {
  	SabreAMF_ClassMapper::$maps = $this->_defaultMapping;
  }
  
  /**
   * It's used by @see _setupMapping for init mapping objects.
   * 
   * @example of returning: array('flex_class' => 'php_class');
   * 
   * @return array 
   */
  protected function _getMappedClasses()
  {
    return array();
  }
  
  /**
   * A url where to send amf requests.
   * 
   * @abstract
   * 
   * @return string
   */
  protected function _getAmfEndPoint($key = 'app_amf_endpoint')
  {
 	  if (!sfConfig::has($key)) {
      throw new Exception('The gateway url for testing amf services must be set in app.yml config file. The app.yml option should have a name `'.$key.'`');
    }
    
    return sfConfig::get($key);
  }
  
  /**
   * Send a request to amf gateway
   * 
   * @param string destination is requered. Example ObjectFoo.functbar 
   * @param array
   * 
   * @throws Exception whether the destination parameter is invalid
   * 
   * @return mixed
   */
  protected function _sendRequest($destination, $params = array())
  {
    if (empty($destination) || !is_string($destination)) {
      throw new Exception('Destination should be no empty and have type string');
    }

    return $this->_getClient()->sendRequest($destination, $params);
  }
  
  
  /**
   * @return SabreAMF_Client
   */
  protected function _getClient()
  {
    return new SabreAMF_Client($this->_getAmfEndPoint());
  }
}