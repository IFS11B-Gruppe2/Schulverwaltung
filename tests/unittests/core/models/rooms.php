<?php

$root = '../../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/rooms.php');


// Test creation
$Rooms = new Model_Rooms();
$pattern = '/^Model_Rooms::/';
$input = var_export($Rooms, true);
$preg_match_result = preg_match(
	'/^Model_Rooms::/',
	var_export($Rooms, true)
);
if ($preg_match_result === 1) {
	echo '<p>ok</p>';
} else {
	echo '
		<p>
			<span style="color:red;">failed</span>
			test name: test creation
			test command: preg_match(\'/^Model_Rooms::/\', var_export($Rooms, true))
		</p>
	';
}


// test getAllRooms method
$db = getMysqlConnection();
$rooms = $Rooms::getAllRooms($db);
$varType = gettype($rooms);
if ($varType === 'array') {
		echo '<p>ok</p>';
} else {
	echo '
		<p>
			<span style="color:red;">failed</span>
			test name: test getAllRooms method
			test command: gettype($rooms) === \'array\'
		</p>
	';
}
