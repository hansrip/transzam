<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

class unit_fixtures/model/PackageTest extends sfPHPUnitBaseTestCase
{
  public function testDefault()
  {
    $t = $this->getTest();

    // lime-like assertions
    //$t->diag('hello world');
    //$t->ok(true, 'test something');
		
    // native assertions
    //$this->assertTrue(true, 'test something')
  }
}