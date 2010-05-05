<?php
// test/unit/model/CustomerTest.php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(1);

$t->fail('TODO create save(0 tests');
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
