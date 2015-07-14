<?php

$root = '..';
require_once($root . '/config/config.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/subcomponentsModel.php');



$subcomponent = new Model_Subcomponents();


$db = getMysqlConnection();
$subcomponent = $subcomponent::getAllSubcomponents($db);

$view = array(
  'component' => $subcomponent
);


require_once($root . '/views/subcomponents/subcomponentsListView.php');
?>
