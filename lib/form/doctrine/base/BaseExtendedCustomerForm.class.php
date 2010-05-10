<?php

/**
 * ExtendedCustomer form base class.
 *
 * @method ExtendedCustomer getObject() Returns the current form's model object
 *
 * @package    transzam
 * @subpackage form
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseExtendedCustomerForm extends CustomerForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['preferred_transporters_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Transporter'));
    $this->validatorSchema['preferred_transporters_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Transporter', 'required' => false));

    $this->widgetSchema->setNameFormat('extended_customer[%s]');
  }

  public function getModelName()
  {
    return 'ExtendedCustomer';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['preferred_transporters_list']))
    {
      $this->setDefault('preferred_transporters_list', $this->object->PreferredTransporters->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePreferredTransportersList($con);

    parent::doSave($con);
  }

  public function savePreferredTransportersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['preferred_transporters_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->PreferredTransporters->getPrimaryKeys();
    $values = $this->getValue('preferred_transporters_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('PreferredTransporters', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('PreferredTransporters', array_values($link));
    }
  }

}
