<?php

require_once 'C:\\dev\\symfony\\lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
     $this->enablePlugins('sfDoctrinePlugin');
     $this->enablePlugins('sfDoctrineGuardPlugin');
  }
}
