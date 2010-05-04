<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    transzam
 * @subpackage form
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GuardUser'), 'add_empty' => true)),
      'company'          => new sfWidgetFormInputText(),
      'district_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('District'), 'add_empty' => true)),
      'address'          => new sfWidgetFormInputText(),
      'email_address'    => new sfWidgetFormInputText(),
      'tel'              => new sfWidgetFormInputText(),
      'cell'             => new sfWidgetFormInputText(),
      'comment'          => new sfWidgetFormInputText(),
      'sms_number'       => new sfWidgetFormInputText(),
      'token'            => new sfWidgetFormInputText(),
      'user_type'        => new sfWidgetFormInputText(),
      'number_of_trucks' => new sfWidgetFormInputText(),
      'business'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GuardUser'), 'required' => false)),
      'company'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'district_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('District'), 'required' => false)),
      'address'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_address'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tel'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cell'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'comment'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sms_number'       => new sfValidatorInteger(array('required' => false)),
      'token'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_type'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'number_of_trucks' => new sfValidatorInteger(array('required' => false)),
      'business'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
