<?php

$root = '../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/login.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/roomsModel.php');

$db = getMysqlConnection();
$rooms = Model_Rooms::getAllRooms($db);

$view = array(
  'rooms' => $rooms,
  'rootPath' => $root
);

require_once($root . '/views/rooms/roomsListView.php');
