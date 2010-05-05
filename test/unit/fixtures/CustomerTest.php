<?php
// test/unit/fixtures/CustomerTest.php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(2);

# Check the existence of all available Customers.
$t->comment('-> fixture Customer');
$number_of_Customers = Doctrine_Core::getTable('Customer')->createQuery()->count();
$t->is($number_of_Customers, 1, '-> fixture Customer. There is 1 Customer counted via DQL');


# Test or the (Customer)name and sfGuardUser.name proper are added via the fixtures.
$q = Doctrine_Query::create()
    ->from('Customer c INDEXBY c.company')
    ->innerJoin('c.GuardUser');
$companies = $q->execute();

$t->is($companies['AuxZambia']->GuardUser->username,
                'hansrip', '-> fixture Customer. CompanyName and GuardUserName proper defined.');

?>
