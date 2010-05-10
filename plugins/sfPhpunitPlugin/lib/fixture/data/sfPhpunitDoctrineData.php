<?php

class sfPhpunitDoctrineData extends Doctrine_Data_Import
{
	/**
	 * (non-PHPdoc)
	 * @see plugins/sfPhpunitPlugin/lib/fixture/data/sfPhpunitDataInterface#getObject($id, $class)
	 */
	public function getObject($id)
	{
	  if (strpos($id, '_') === false) {
	    throw new Exception('The id should match the pattern {class}_{id} but you provide: `'.$id.'`'); 
	  }
	  
	  list($table, $id) = explode('_', $id, 2);
    $id = '('.strtolower($table).') '.strtolower($id);
    
   	return isset($this->_importedObjects[$id]) ? $this->_importedObjects[$id] : null;
	}
	
	public function cleanObjects()
	{
		$this->_importedObjects = array();
	}
}