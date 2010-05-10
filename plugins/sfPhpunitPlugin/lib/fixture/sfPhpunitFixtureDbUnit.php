<?php

/**
 *
 * Class for managing propel fixtures.
 *
 * @package    sfPhpunitPlugin
 * @subpackage fixture
 * @author     Maksim Kotlyar <mkotlar@ukr.net>
 */
class sfPhpunitFixtureDbUnit extends sfPhpunitFixture
{
  //protected $_requiredOptions = array('db_adapter', 'fixture_ext');

  /**
   *
   * @var array
   */
  protected $_options = array(
    'fixture_ext' => '.propel.yml');

  public function __construct(sfBasePhpunitTestCase $case, array $options)
  {
    parent::__construct($case, $options);

     
  }

  /**
   * (non-PHPdoc)
   * @see plugins/sfPhpunitPlugin/lib/fixture/sfPhpunitFixtureAbstract#load($file, $fixture_type, $clean_before)
   */
  public function load($file = null, $fixture_type = self::OWN)
  {
    throw new Exception('Not complited yet');
  }

  /**
   * (non-PHPdoc)
   * @see plugins/sfPhpunitPlugin/lib/fixture/sfPhpunitFixtureAbstract#clean()
   */
  public function clean()
  {
    throw new Exception('Not complited yet');
  }


  /**
   * (non-PHPdoc)
   * @see plugins/sfPhpunitPlugin/lib/fixture/sfPhpunitFixtureAbstract#get($file, $fixture_type)
   */
  public function get($id, $class = null)
  {
    throw new Exception('Not complited yet');
  }
}