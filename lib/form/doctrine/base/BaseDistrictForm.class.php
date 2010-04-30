<?php

/**
 * District form base class.
 *
 * @method District getObject() Returns the current form's model object
 *
 * @package    transzam
 * @subpackage form
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDistrictForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'province_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Province'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'province_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Province'))),
    ));

    $this->widgetSchema->setNameFormat('district[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'District';
  }

}
