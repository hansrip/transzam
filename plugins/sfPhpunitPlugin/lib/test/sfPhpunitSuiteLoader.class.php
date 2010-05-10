<?php

/**
 * Symfony phpunit tests loader.
 * 
 * It`s 
 *
 * @package    sfPhpunitPlugin
 * @subpackage lib
 * @author     Maksim Kotlyar <mkotlar@ukr.net>
 */
class sfPhpunitSuiteLoader
{
  private $_excludeDirs = array('.svn', 'fixtures');
  
	/**
	 * 
	 * @var string
	 */
  private $_path;
  
  private $_recursively = false;
  
  /**
   * root suite
   * 
   * @var sfBasePhpunitTestSuite
   */
  private $_suite;

  /**
   * 
   * @param string $path
   * @return viod
   */
	public function __construct($path = null)
	{
		if (empty($path) || $path[strlen($path) - 1] == '*') {
			$path = substr($path, 0, strlen($path) - 1);
			$this->_recursively = true;
		} 
		
		$root_dir = $test_dir = sfConfig::get('sf_test_dir').'/phpunit';
		if (!file_exists($root_dir.'/'.$path)) {
			throw new Exception('The path `'.$path.'` is invalid.');
		}
    
		$this->_path = $path; 
	}

	/**
	 * @return PHPUnit_Framework_TestSuite
	 */
	public function getSuite()
	{
		return $this->_suite;
	} 
  
	/**
	 * Load default suites and tests
	 * 
	 * @return viod
	 */
	public function load()
	{
		$root_dir = $test_dir = sfConfig::get('sf_test_dir').'/phpunit';
		$this->_suite = $suite = $this->_getTestSuiteForDir($root_dir);
			  
		if (!empty($this->_path)) {
			$dirs = array_filter(explode('/', $this->_path));
	    if (is_file($root_dir.'/'.$this->_path)) {
	      array_pop($dirs);
	    }

			foreach ($dirs as $dir) {
				$suite->addTestSuite($suite_next = $this->_getTestSuiteForDir($test_dir));
				$suite = $suite_next;
			}
		}

		$this->_load($root_dir.'/'.$this->_path, $suite);
	}
	
	/**
	 * 
	 * @return PHPUnit_Framework_TestResult
	 */
	public function run()
	{
		$this->getSuite()->run($result = new PHPUnit_Framework_TestResult());
		
		return $result;
	}

	/**
	 * Load unit tests
	 * 
	 * @param string $path
	 * @param sfBasePhpunitTestSuite $suite
	 * @param bool $recursively
	 * 
	 * @return void
	 */
	protected function _load($path, sfBasePhpunitTestSuite $suite)
	{
		if (is_file($path)) {
		  $this->_loadFile($path, $suite);	
		} else {
		  $this->_loadDir($path, $suite);	
		}
	}

	/**
	 * 
	 * @param string $path
	 * @param sfBasePhpunitTestSuite $suite
	 * @param bool $recursively
	 * 
	 * @return void
	 */
	protected function _loadDir($path, sfBasePhpunitTestSuite $suite)
	{
		foreach (new DirectoryIterator($path) as $item) {
		  //exclude system\metadirs;
		  if (in_array($item->getFilename(),$this->_excludeDirs)) {
		    continue;
		  }
		  
		  if ($item->isFile()) {
				$this->_loadFile($item->getPathname(), $suite);
			} else if (!$item->isDot() && $item->isDir() && $this->_recursively) {
				$suite_next = $this->_getTestSuiteForDir($item->getPathname());
				$suite->addTestSuite($suite_next);
				$this->_loadDir($item->getPathname(), $suite_next);
			}
		}
	}

	/**
	 * 
	 * @param string $path
	 * @param sfBasePhpunitTestSuite $suite
	 * 
	 * @return void
	 */
	protected function _loadFile($path, sfBasePhpunitTestSuite $suite)
	{
		if(preg_match('/\.php$/', $path)) {
			$suite->addTestFile($path);
		}
	}

	/**
	 * 
	 * @param string $path
	 * @throws Exception if file ending on TestSuite.class.php exists but does not contain TestSuite class.
	 * 
	 * @return sfBasePhpunitTestSuite
	 */
	protected function _getTestSuiteForDir($path)
	{
		if (is_file($path)) $path = dirname($path);
		
		$test_suite_files = sfFinder::type('file')->name('*TestSuite.php')->maxdepth(0)->in($path);
		if (!$path = array_shift($test_suite_files)) {
			return new sfBasePhpunitTestSuite();
		}
		
		require_once $path;
		foreach ($this->_getClassessInFile($path) as $class) {
		  $reflection = new ReflectionClass($class);
      if ($reflection->isSubclassOf('sfBasePhpunitTestSuite')) {
        return new $class();
      }
		}
				
		throw new Exception('The file `'.$path.'` does not contain a suite class');
	}
	
	protected function _getClassessInFile($path)
	{
	  if (version_compare(PHPUnit_Runner_Version::id(), '3.4', '<')) {
      $classes = array();
	    foreach (PHPUnit_Util_Class::getClassesInFile($path) as $reflection) {
        $classes[] = $reflection->getName(); 
      }
      
      return $classes;
    } else {
      return array_keys(PHPUnit_Util_File::getClassesInFile($path));
    }
	}
	
	/**
	 * 
	 * @param string $path
	 * 
	 * @return sfPhpunitSuiteLoader
	 */
	public static function factory($path = null)
	{
		$loader = new self($path);
		$loader->load();
		
		return $loader;
	}
}