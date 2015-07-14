<?php

class Model_Subcomponents {
	static function getAllSubcomponents($db, $orderBy = 'k.PK_ID') {
		$mysqlResult = null;
		$subcomponent = array();
		$sql = '
			SELECT kart.Bezeichnung as Komponentenart, k.Beschreibung, k.Hersteller, k.Einkaufsdatum, k.Einkaufsdatum + INTERVAL k.Gewaehrleistungsdauer YEAR as Ablaufdatum, k.Gewaehrleistungsdauer, k.Notiz, k.FK_Lieferant, k.FK_Raum, l.Name
			FROM komponente as k, komponentenart as kart, lieferant as l
			WHERE k.FK_Lieferant = l.PK_ID
			AND k.FK_Komponentenart = kart.PK_ID
			AND k.FK_Komponentenart != 1
			AND k.FK_Komponentenart != 19
			ORDER BY ' . $orderBy . '
		';

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		$mysqlResult->data_seek(0);
		while ($row = $mysqlResult->fetch_assoc()) {
			array_push($subcomponent, $row);
		}

		return $subcomponent;
	}
}
