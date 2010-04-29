<?php

/**
 * BaseDistrict
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $province_id
 * @property Province $Province
 * @property Doctrine_Collection $FromDistricts
 * @property Doctrine_Collection $ToDistricts
 * 
 * @method string              getName()          Returns the current record's "name" value
 * @method integer             getProvinceId()    Returns the current record's "province_id" value
 * @method Province            getProvince()      Returns the current record's "Province" value
 * @method Doctrine_Collection getFromDistricts() Returns the current record's "FromDistricts" collection
 * @method Doctrine_Collection getToDistricts()   Returns the current record's "ToDistricts" collection
 * @method District            setName()          Sets the current record's "name" value
 * @method District            setProvinceId()    Sets the current record's "province_id" value
 * @method District            setProvince()      Sets the current record's "Province" value
 * @method District            setFromDistricts() Sets the current record's "FromDistricts" collection
 * @method District            setToDistricts()   Sets the current record's "ToDistricts" collection
 * 
 * @package    transzam
 * @subpackage model
 * @author     Hans Rip
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDistrict extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('district');
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('province_id', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Province', array(
             'local' => 'province_id',
             'foreign' => 'id'));

        $this->hasMany('TransportLoad as FromDistricts', array(
             'local' => 'id',
             'foreign' => 'from_district'));

        $this->hasMany('TransportLoad as ToDistricts', array(
             'local' => 'id',
             'foreign' => 'to_district'));
    }
}