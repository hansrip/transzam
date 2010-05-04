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
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GuardUser'), 'add_empty' => true)),
      'company'          => new sfWidgetFormFilterInput(),
      'district_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('District'), 'add_empty' => true)),
      'address'          => new sfWidgetFormFilterInput(),
      'email_address'    => new sfWidgetFormFilterInput(),
      'tel'              => new sfWidgetFormFilterInput(),
      'cell'             => new sfWidgetFormFilterInput(),
      'comment'          => new sfWidgetFormFilterInput(),
      'sms_number'       => new sfWidgetFormFilterInput(),
      'token'            => new sfWidgetFormFilterInput(),
      'user_type'        => new sfWidgetFormFilterInput(),
      'number_of_trucks' => new sfWidgetFormFilterInput(),
      'business'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GuardUser'), 'column' => 'id')),
      'company'          => new sfValidatorPass(array('required' => false)),
      'district_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('District'), 'column' => 'id')),
      'address'          => new sfValidatorPass(array('required' => false)),
      'email_address'    => new sfValidatorPass(array('required' => false)),
      'tel'              => new sfValidatorPass(array('required' => false)),
      'cell'             => new sfValidatorPass(array('required' => false)),
      'comment'          => new sfValidatorPass(array('required' => false)),
      'sms_number'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'token'            => new sfValidatorPass(array('required' => false)),
      'user_type'        => new sfValidatorPass(array('required' => false)),
      'number_of_trucks' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'business'         => new sfValidatorPass(array('required' => false)),
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
      'sf_guard_user_id' => 'ForeignKey',
      'company'          => 'Text',
      'district_id'      => 'ForeignKey',
      'address'          => 'Text',
      'email_address'    => 'Text',
      'tel'              => 'Text',
      'cell'             => 'Text',
      'comment'          => 'Text',
      'sms_number'       => 'Number',
      'token'            => 'Text',
      'user_type'        => 'Text',
      'number_of_trucks' => 'Number',
      'business'         => 'Text',
    );
  }
}
