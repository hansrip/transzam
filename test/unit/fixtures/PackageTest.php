<?php
// test/unit/fixtures/PackageTest.php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(2);

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

?>
