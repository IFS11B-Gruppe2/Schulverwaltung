<?php

$root = '../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/maincomponentsModel.php');

$db = getMysqlConnection();

if (isset($_GET['PK_Raumnr'])) {
	$maincomponents = Model_Maincomponents::getMaincomponentsByRoomNumber($db, $_GET['PK_Raumnr']);
} else {
	$maincomponents = Model_Maincomponents::getAllMaincomponents($db);
}

$view = array(
  'maincomponents' => $maincomponents,
  'rootPath' => $root
);

require_once($root . '/views/maincomponents/maincomponentsListView.php');
