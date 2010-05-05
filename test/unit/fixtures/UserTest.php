<?php
// test/unit/fixtures/UserTest.php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(3);

# Check the existence of all available Users.
$t->comment('-> fixture User');
$number_of_Users = Doctrine_Core::getTable('User')->createQuery()->count();
$t->is($number_of_Users, 2, '-> fixture User. There are 2 Users counted via DQL');

# Test or the name is proper added.
$q = Doctrine_Query::create()
    ->from('User u INDEXBY u.company');

$users = $q->execute();
$t->is($users['AuxZambia']->company, 'AuxZambia',
        '-> fixture User. Company proper defined.');

# Test the right relation and existence of sfGuardUser.
$q = Doctrine_Query::create()
    ->from('User u INDEXBY u.company')
    ->innerJoin('u.GuardUser');
$users = $q->execute();

$t->is($users['Summeling']->GuardUser->username, 'ericsummeling',
                       '-> fixture User. Represent the right sfGuardUser.username');

?>
