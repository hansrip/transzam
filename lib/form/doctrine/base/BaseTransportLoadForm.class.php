<?php

/**
 * TransportLoad form base class.
 *
 * @method TransportLoad getObject() Returns the current form's model object
 *
 * @package    transzam
 * @subpackage form
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTransportLoadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'customer_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'add_empty' => false)),
      'transporter_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Transporter'), 'add_empty' => false)),
      'from'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FromDistrict'), 'add_empty' => false)),
      'to'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ToDistrict'), 'add_empty' => false)),
      'load_description' => new sfWidgetFormInputText(),
      'package_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Package'), 'add_empty' => false)),
      'weight'           => new sfWidgetFormInputText(),
      'arrive_before'    => new sfWidgetFormDateTime(),
      'arrive_after'     => new sfWidgetFormDateTime(),
      'expired_at'       => new sfWidgetFormDateTime(),
      'bid'              => new sfWidgetFormChoice(array('choices' => array('Open' => 'Open', 'Taken' => 'Taken', 'Cancelled' => 'Cancelled'))),
      'comment'          => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'customer_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'))),
      'transporter_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Transporter'))),
      'from'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('FromDistrict'))),
      'to'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ToDistrict'))),
      'load_description' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'package_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Package'))),
      'weight'           => new sfValidatorPass(array('required' => false)),
      'arrive_before'    => new sfValidatorDateTime(),
      'arrive_after'     => new sfValidatorDateTime(array('required' => false)),
      'expired_at'       => new sfValidatorDateTime(array('required' => false)),
      'bid'              => new sfValidatorChoice(array('choices' => array(0 => 'Open', 1 => 'Taken', 2 => 'Cancelled'), 'required' => false)),
      'comment'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('transport_load[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransportLoad';
  }

}
