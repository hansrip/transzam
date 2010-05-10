<?php

/**
 * Transporter form.
 *
 * @package    transzam
 * @subpackage form
 * @author     Hans Rip
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TransporterForm extends BaseTransporterForm
{
  /**
   * @see UserForm
   */
  public function configure()
  {
      parent::configure();
      unset($this['business']);
  }


}

