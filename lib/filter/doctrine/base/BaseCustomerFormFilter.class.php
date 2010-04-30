<?php

/**
 * Customer filter form base class.
 *
 * @package    transzam
 * @subpackage filter
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCustomerFormFilter extends UserFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('customer_filters[%s]');
  }

  public function getModelName()
  {
    return 'Customer';
  }
}
