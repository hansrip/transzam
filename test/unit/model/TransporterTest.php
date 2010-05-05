<?php
// test/unit/model/TransporterTest.php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(1);

$t->fail('TODO write save() tests');
/*
# Add a record to the Transporter class and test the existence via DQL
$Transporter = create_Transporter(merge_array(array('company' => 'testTransporter'));
$Transporter->save();

$q = Doctrine_Query::create()
    ->from('Transporter t')
    ->where('t.comapny = ?', testTransporter);
$Transporter = $q->fetchOne();
$t->is($q->count(), 1, '-> save() saved Transporter \'testTransporter\' found via DQL');

# Add a record to the Transporter class with an empty name and test the existence via DQL
$Transporter = create_Transporter(array('name' => ''));
$Transporter->save();

$q = Doctrine_Query::create()
    ->from('Transporter p')
    ->where('p.name = ?', '');
$t->is($q->count(), 1, '-> save() saved Transporter.name \'\' (empty name) and found via DQL');


#$expiresAt = date('Y-m-d', time() + 86400 * sfConfig::get('app_active_days'));
#$t->is($job->getDateTimeObject('expires_at')->format('Y-m-d'), $expiresAt, '->save() updates expires_at if not set');

#$job = create_job(array('expires_at' => '2008-08-08'));
#$job->save();
#$t->is($job->getDateTimeObject('expires_at')->format('Y-m-d'), '2008-08-08', '->save() does not update expires_at if set');

function create_Transporter($defaults = array())
{
  $Transporter = new Transporter();
  $Transporter->fromArray($defaults);

  return $Transporter;
}
*/
?>
