<?php
// test/unit/model/PackageTest.php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(2);


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

function create_package($defaults = array())
{
  $package = new Package();
  $package->fromArray($defaults);

  return $package;
}

?>
