<?php

/**
 * User filter form base class.
 *
 * @package    transzam
 * @subpackage filter
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(),
      'username'         => new sfWidgetFormFilterInput(),
      'password'         => new sfWidgetFormFilterInput(),
      'mobile_number'    => new sfWidgetFormFilterInput(),
      'token'            => new sfWidgetFormFilterInput(),
      'number_of_trucks' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'username'         => new sfValidatorPass(array('required' => false)),
      'password'         => new sfValidatorPass(array('required' => false)),
      'mobile_number'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'token'            => new sfValidatorPass(array('required' => false)),
      'number_of_trucks' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'username'         => 'Text',
      'password'         => 'Text',
      'mobile_number'    => 'Number',
      'token'            => 'Text',
      'number_of_trucks' => 'Number',
    );
  }
}
