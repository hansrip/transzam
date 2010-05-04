<?php
// test/unit/model/CustomerTest.php
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


# save()
$t->comment('-> save()');
$t->comment('-> save(). TODO : create save()tests!')
/*
# Add a record to the Customer class and test the existence via DQL
$Customer = create_Customer(merge_array(array('Customer' => 'testCustomer'));
$Customer->save();

$q = Doctrine_Query::create()
    ->from('Customer t')
    ->where('t.comapny = ?', testCustomer);
$Customer = $q->fetchOne();
$t->is($q->count(), 1, '-> save() saved Customer \'testCustomer\' found via DQL');

# Add a record to the Customer class with an empty name and test the existence via DQL
$Customer = create_Customer(array('name' => ''));
$Customer->save();

$q = Doctrine_Query::create()
    ->from('Customer p')
    ->where('p.name = ?', '');
$t->is($q->count(), 1, '-> save() saved Customer.name \'\' (empty name) and found via DQL');


#$expiresAt = date('Y-m-d', time() + 86400 * sfConfig::get('app_active_days'));
#$t->is($job->getDateTimeObject('expires_at')->format('Y-m-d'), $expiresAt, '->save() updates expires_at if not set');

#$job = create_job(array('expires_at' => '2008-08-08'));
#$job->save();
#$t->is($job->getDateTimeObject('expires_at')->format('Y-m-d'), '2008-08-08', '->save() does not update expires_at if set');

function create_Customer($defaults = array())
{
  $Customer = new Customer();
  $Customer->fromArray($defaults);

  return $Customer;
}
*/
?>
