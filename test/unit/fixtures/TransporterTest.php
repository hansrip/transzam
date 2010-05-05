<?php
// test/unit/fixtures/TransporterTest.php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(2);

# Check the existence of all available Transporters.
$t->comment('-> fixture Transporter');
$number_of_Transporters = Doctrine_Core::getTable('Transporter')->createQuery()->count();
$t->is($number_of_Transporters, 1, '-> fixture Transporter. There is 1 Transporter counted via DQL');


# Test or the (company)name and sfGuardUser.name proper are added via the fixtures.
$q = Doctrine_Query::create()
    ->from('Transporter t INDEXBY t.company')
    ->innerJoin('t.GuardUser');
$transporters= $q->execute();

$t->is($transporters['Summeling']->GuardUser->username,
                  'ericsummeling', '-> fixture Transporter. Name proper defined.');

# Test the proper district name from the transporter.
# TODO
?>
