<?php

require_once 'C:\\dev\\sf_project\\lib\\vendor\\symfony\\lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
	public function setup()
	{
	  $this->enablePlugins('sfDoctrinePlugin');
  }
}
