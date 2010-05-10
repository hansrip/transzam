<?php
// test/unit/fixtures/TransportLoadTest.php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(6);

# Check the existence of all available TransportLoads.
$t->comment('-> fixture TransportLoad');
$number_of_TransportLoads = Doctrine_Core::getTable('TransportLoad')->createQuery()->count();
$t->is($number_of_TransportLoads, 1, '-> fixture TransportLoad. There is 1 TransportLoad counted via DQL');


# Test or the (company)name and sfGuardUser.name proper are added via the fixtures.
$q = Doctrine_Query::create()
        ->select('df.name as df_name, dt.name as dt_name, tg.username as tg_username, cg.username as cg_username, t.sf_guard_user_id as t_guard_user, c.sf_guard_user_id as c_guard_user, tl.bid as bid ')
        ->from('TransportLoad tl')
        ->leftJoin('tl.FromDistrict df')
        ->leftJoin('tl.ToDistrict dt')
        ->leftJoin('tl.Customer c, c.GuardUser cg')
        ->leftJoin('tl.Transporter t, t.GuardUser tg');


$transportLoads= $q->execute();

/* Test purpose */
  $t->is($transportLoads->toArray(), 'NULL', '-> fixture TransportLoad. Array checked');
 

$t->is($transportLoads[0]->tg_username, 'ericsummeling',
                    '-> fixture TransportLoad. Transporter proper defined.');

$t->is($transportLoads[0]->cg_username, 'hansrip',
                    '-> fixture TransportLoad. Customer proper defined.');

$t->is($transportLoads[0]->bid , 'Open',
                    '-> fixture TransportLoad. Bid proper defined.');

$t->is($transportLoads[0]->df_name, 'Lusaka City',
                    '-> fixture TransportLoad. DistrictFrom proper defined');

$t->is($transportLoads[0]->dt_name, 'Lusaka City',
                    '-> fixture TransportLoad. DistrictTo proper defined');

?>
