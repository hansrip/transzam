<?php

/**
 * Customer form base class.
 *
 * @method Customer getObject() Returns the current form's model object
 *
 * @package    transzam
 * @subpackage form
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCustomerForm extends UserForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('customer[%s]');
  }

  public function getModelName()
  {
    return 'Customer';
  }

}
