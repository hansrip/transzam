<?php

/**
 * BaseAdminSettings
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property timestamp $transportload_expiration_in_days
 * 
 * @method timestamp     getTransportloadExpirationInDays()    Returns the current record's "transportload_expiration_in_days" value
 * @method AdminSettings setTransportloadExpirationInDays()    Sets the current record's "transportload_expiration_in_days" value
 * 
 * @package    transzam
 * @subpackage model
 * @author     Hans Rip
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdminSettings extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('admin_settings');
        $this->hasColumn('transportload_expiration_in_days', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}