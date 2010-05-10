<?php

class sfPhpunitPropelData extends sfPropelData
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
	  
		return isset($this->object_references[$id]) ? $this->object_references[$id] : null;
	}
	
	public function cleanObjects()
	{
		$this->object_references = array();
	}
}