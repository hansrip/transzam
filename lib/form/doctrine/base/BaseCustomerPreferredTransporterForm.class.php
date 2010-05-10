<?php

/**
 * CustomerPreferredTransporter form base class.
 *
 * @method CustomerPreferredTransporter getObject() Returns the current form's model object
 *
 * @package    transzam
 * @subpackage form
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCustomerPreferredTransporterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'customer_id'    => new sfWidgetFormInputHidden(),
      'transporter_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'customer_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'customer_id', 'required' => false)),
      'transporter_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'transporter_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('customer_preferred_transporter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CustomerPreferredTransporter';
  }

}
