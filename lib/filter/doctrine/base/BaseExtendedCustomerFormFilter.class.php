<?php

/**
 * ExtendedCustomer filter form base class.
 *
 * @package    transzam
 * @subpackage filter
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseExtendedCustomerFormFilter extends CustomerFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['preferred_transporters_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Transporter'));
    $this->validatorSchema['preferred_transporters_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Transporter', 'required' => false));

    $this->widgetSchema->setNameFormat('extended_customer_filters[%s]');
  }

  public function addPreferredTransportersListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('CustomerPreferredTransporter.transporter_id', $values);
  }

  public function getModelName()
  {
    return 'ExtendedCustomer';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'preferred_transporters_list' => 'ManyKey',
    ));
  }
}
