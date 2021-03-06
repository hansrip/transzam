<?php

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $sf_guard_user_id
 * @property string $company
 * @property integer $district_id
 * @property string $address
 * @property string $email_address
 * @property string $tel
 * @property string $cell
 * @property string $comment
 * @property integer $sms_number
 * @property string $user_type
 * @property integer $number_of_trucks
 * @property string $business
 * @property sfGuardUser $GuardUser
 * @property District $District
 * 
 * @method integer     getSfGuardUserId()    Returns the current record's "sf_guard_user_id" value
 * @method string      getCompany()          Returns the current record's "company" value
 * @method integer     getDistrictId()       Returns the current record's "district_id" value
 * @method string      getAddress()          Returns the current record's "address" value
 * @method string      getEmailAddress()     Returns the current record's "email_address" value
 * @method string      getTel()              Returns the current record's "tel" value
 * @method string      getCell()             Returns the current record's "cell" value
 * @method string      getComment()          Returns the current record's "comment" value
 * @method integer     getSmsNumber()        Returns the current record's "sms_number" value
 * @method string      getUserType()         Returns the current record's "user_type" value
 * @method integer     getNumberOfTrucks()   Returns the current record's "number_of_trucks" value
 * @method string      getBusiness()         Returns the current record's "business" value
 * @method sfGuardUser getGuardUser()        Returns the current record's "GuardUser" value
 * @method District    getDistrict()         Returns the current record's "District" value
 * @method User        setSfGuardUserId()    Sets the current record's "sf_guard_user_id" value
 * @method User        setCompany()          Sets the current record's "company" value
 * @method User        setDistrictId()       Sets the current record's "district_id" value
 * @method User        setAddress()          Sets the current record's "address" value
 * @method User        setEmailAddress()     Sets the current record's "email_address" value
 * @method User        setTel()              Sets the current record's "tel" value
 * @method User        setCell()             Sets the current record's "cell" value
 * @method User        setComment()          Sets the current record's "comment" value
 * @method User        setSmsNumber()        Sets the current record's "sms_number" value
 * @method User        setUserType()         Sets the current record's "user_type" value
 * @method User        setNumberOfTrucks()   Sets the current record's "number_of_trucks" value
 * @method User        setBusiness()         Sets the current record's "business" value
 * @method User        setGuardUser()        Sets the current record's "GuardUser" value
 * @method User        setDistrict()         Sets the current record's "District" value
 * 
 * @package    transzam
 * @subpackage model
 * @author     Hans Rip
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('sf_guard_user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('company', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('district_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email_address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('tel', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cell', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('comment', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('sms_number', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('user_type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('number_of_trucks', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('business', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));

        $this->setSubClasses(array(
             'Transporter' => 
             array(
              'user_type' => 'transporter',
             ),
             'Customer' => 
             array(
              'user_type' => 'customer',
             ),
             'ExtendedCustomer' => 
             array(
              'user_type' => 'customer',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as GuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id'));

        $this->hasOne('District', array(
             'local' => 'district_id',
             'foreign' => 'id'));
    }
}