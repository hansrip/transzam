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

    $this->widgetSchema->setNameFormat('transporter_filters[%s]');
  }

  public function getModelName()
  {
    return 'Transporter';
  }
}
