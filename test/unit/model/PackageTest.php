<?php
// test/unit/model/PackageTest.php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(4);

# Check the existence of all available packages.
$t->comment('-> fixture Package');
$number_of_packages = Doctrine_Core::getTable('Package')->createQuery()->count();
$t->is($number_of_packages, 6, '-> fixture Package. There are 6 packages counted via DQL');


# Test or the name is proper added.
$q = Doctrine_Query::create()
    ->from('Package p')
    ->where('p.name = ?', Cooling);
$package = $q->fetchOne();
$t->is($package['name'], 'Cooling', '-> fixture Package finds package Cooling');

# save()
$t->comment('-> save()');

# Add a record to the package class and test the existence via DQL
$package = create_package(array('name' => 'testpackage'));
$package->save();

$q = Doctrine_Query::create()
    ->from('Package p')
    ->where('p.name = ?', testpackage);
$package = $q->fetchOne();
$t->is($q->count(), 1, '-> save() saved package \'testpackage\' and found via DQL');

# Add a record to the package class with an empty name and test the existence via DQL
$package = create_package(array('name' => ''));
$package->save();

$q = Doctrine_Query::create()
    ->from('Package p')
    ->where('p.name = ?', '');
$t->is($q->count(), 1, '-> save() saved package.name \'\' (empty name) and found via DQL');


#$expiresAt = date('Y-m-d', time() + 86400 * sfConfig::get('app_active_days'));
#$t->is($job->getDateTimeObject('expires_at')->format('Y-m-d'), $expiresAt, '->save() updates expires_at if not set');

#$job = create_job(array('expires_at' => '2008-08-08'));
#$job->save();
#$t->is($job->getDateTimeObject('expires_at')->format('Y-m-d'), '2008-08-08', '->save() does not update expires_at if set');

function create_package($defaults = array())
{
  $package = new Package();
  $package->fromArray($defaults);

  return $package;
}

?>
