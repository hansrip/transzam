<?php

/**
 * Transporter filter form base class.
 *
 * @package    transzam
 * @subpackage filter
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTransporterFormFilter extends UserFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['transporters_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ExtendedCustomer'));
    $this->validatorSchema['transporters_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ExtendedCustomer', 'required' => false));

    $this->widgetSchema->setNameFormat('transporter_filters[%s]');
  }

  public function addTransportersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.CustomerPreferredTransporter CustomerPreferredTransporter')
          ->andWhereIn('CustomerPreferredTransporter.customer_id', $values);
  }

  public function getModelName()
  {
    return 'Transporter';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'transporters_list' => 'ManyKey',
    ));
  }
}
