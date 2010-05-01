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
      'name'             => new sfWidgetFormInputText(),
      'username'         => new sfWidgetFormInputText(),
      'password'         => new sfWidgetFormInputText(),
      'mobile_number'    => new sfWidgetFormInputText(),
      'token'            => new sfWidgetFormInputText(),
      'user_type'        => new sfWidgetFormInputText(),
      'number_of_trucks' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'username'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'password'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mobile_number'    => new sfValidatorInteger(array('required' => false)),
      'token'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_type'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'number_of_trucks' => new sfValidatorInteger(array('required' => false)),
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
