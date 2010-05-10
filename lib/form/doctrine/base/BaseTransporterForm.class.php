<?php

/**
 * Transporter form base class.
 *
 * @method Transporter getObject() Returns the current form's model object
 *
 * @package    transzam
 * @subpackage form
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTransporterForm extends UserForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['transporters_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ExtendedCustomer'));
    $this->validatorSchema['transporters_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ExtendedCustomer', 'required' => false));

    $this->widgetSchema->setNameFormat('transporter[%s]');
  }

  public function getModelName()
  {
    return 'Transporter';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['transporters_list']))
    {
      $this->setDefault('transporters_list', $this->object->Transporters->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveTransportersList($con);

    parent::doSave($con);
  }

  public function saveTransportersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['transporters_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Transporters->getPrimaryKeys();
    $values = $this->getValue('transporters_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Transporters', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Transporters', array_values($link));
    }
  }

}
