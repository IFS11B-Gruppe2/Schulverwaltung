<?php

class Model_Rooms {
	static function getAllRooms($db, $orderBy = 'PK_Raumnr') {
		$mysqlResult = null;
		$rooms = array();

		$sql = '
			SELECT
				r.*,
				(
					SELECT COUNT(k.PK_ID)
					FROM komponente k
					WHERE k.FK_Raum = r.PK_Raumnr
					AND k.FK_Komponentenart = 1 # PC
				) as "total_pc",
				(
					SELECT COUNT(k.PK_ID)
					FROM komponente k
					WHERE k.FK_Raum = r.PK_Raumnr
					AND k.FK_Komponentenart = 19 # Printers
				) as "total_printers"
			FROM raum r
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
