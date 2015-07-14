<?php

class Model_Rooms {
	function getAllRooms($db, $orderBy = 'PK_Raumnr') {
		$mysqlResult = null;
		$rooms = array();
		$sql = '
			SELECT *
			FROM raum
			ORDER BY ' . $orderBy . '
		';

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		$mysqlResult->data_seek(0);
		while ($row = $mysqlResult->fetch_assoc()) {
			array_push($rooms, $row);
		}

		return $rooms;
	}
}
