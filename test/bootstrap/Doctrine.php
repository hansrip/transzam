<?php
// test/bootstrap/Doctrine.php
include(dirname(__FILE__).'/unit.php');

$configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);

new sfDatabaseManager($configuration);

Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');

$manager = Doctrine_Manager::getInstance();
$conn = Doctrine_Manager::connection('', 'doctrine');