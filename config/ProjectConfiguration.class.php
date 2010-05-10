<?php

require_once 'C:\\dev\\symfony\\lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
     $this->enablePlugins('sfDoctrinePlugin');
     $this->enablePlugins('sfDoctrineGuardPlugin');
     /* $this->enablePlugins('sfAdminThemejRollerPlugin'); */
     $this->enablePlugins('sfPhpunitPlugin');
    $this->enablePlugins('sfPHPUnit2Plugin'); 
    $this->enablePlugins('sfFormExtraPlugin');
  }
}
