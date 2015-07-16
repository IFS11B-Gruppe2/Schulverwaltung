<?php

$rootPath = '../../..';
require_once($rootPath . '/config/config.php');
require_once($rootPath . '/core/login.php');
require_once($rootPath . '/core/mysql.php');
require_once($rootPath . '/core/models/roomsModel.php');

$db = getMysqlConnection();
$rooms = Model_Rooms::getAllRooms($db);

$view = array(
  'rooms' => $rooms,
  'rootPath' => $rootPath
);

require_once($rootPath . '/views/rooms/roomsListView.php');
