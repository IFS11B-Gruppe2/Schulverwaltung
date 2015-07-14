<?php


$root = '../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/roomsModel.php');



$Rooms = new Model_Rooms();


$db = getMysqlConnection();
$rooms = $Rooms::getAllRooms($db);

$view = array(
  'rooms' => $rooms
);


require_once($root . '/views/rooms/roomsListView.php');
?>
