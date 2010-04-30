<?php

/**
 * District filter form base class.
 *
 * @package    transzam
 * @subpackage filter
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDistrictFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'province_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Province'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'province_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Province'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('district_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'District';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'province_id' => 'ForeignKey',
    );
  }
}
