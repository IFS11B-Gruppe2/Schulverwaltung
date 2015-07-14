<?php

class Model_Rooms {
	static function getAllRooms($db, $orderBy = 'r.PK_Raumnr') {
		$mysqlResult = null;
		$rooms = array();
		$sql = '
			SELECT r.PK_Raumnr, r.Stockwerk, r.Notiz, count(k.PK_ID) as pc_anzahl
			FROM raum as r, komponente as k
			WHERE r.PK_Raumnr = k.FK_Raum
			AND k.FK_Komponentenart = 19
			GROUP BY r.PK_Raumnr
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
