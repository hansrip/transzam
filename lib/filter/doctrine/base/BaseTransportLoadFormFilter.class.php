<?php

/**
 * TransportLoad filter form base class.
 *
 * @package    transzam
 * @subpackage filter
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTransportLoadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'customer_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'add_empty' => true)),
      'transporter_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Transporter'), 'add_empty' => true)),
      'posted_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'from'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FromDistrict'), 'add_empty' => true)),
      'to'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ToDistrict'), 'add_empty' => true)),
      'load_description' => new sfWidgetFormFilterInput(),
      'package_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Package'), 'add_empty' => true)),
      'weight'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'arrive_before'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'arrive_after'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'expired_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'bid'              => new sfWidgetFormChoice(array('choices' => array('' => '', 'Open' => 'Open', 'Taken' => 'Taken', 'Cancelled' => 'Cancelled'))),
      'comment'          => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'customer_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Customer'), 'column' => 'id')),
      'transporter_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Transporter'), 'column' => 'id')),
      'posted_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'from'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('FromDistrict'), 'column' => 'id')),
      'to'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ToDistrict'), 'column' => 'id')),
      'load_description' => new sfValidatorPass(array('required' => false)),
      'package_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Package'), 'column' => 'id')),
      'weight'           => new sfValidatorPass(array('required' => false)),
      'arrive_before'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'arrive_after'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'expired_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'bid'              => new sfValidatorChoice(array('required' => false, 'choices' => array('Open' => 'Open', 'Taken' => 'Taken', 'Cancelled' => 'Cancelled'))),
      'comment'          => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('transport_load_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransportLoad';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'customer_id'      => 'ForeignKey',
      'transporter_id'   => 'ForeignKey',
      'posted_at'        => 'Date',
      'from'             => 'ForeignKey',
      'to'               => 'ForeignKey',
      'load_description' => 'Text',
      'package_id'       => 'ForeignKey',
      'weight'           => 'Text',
      'arrive_before'    => 'Date',
      'arrive_after'     => 'Date',
      'expired_at'       => 'Date',
      'bid'              => 'Enum',
      'comment'          => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
