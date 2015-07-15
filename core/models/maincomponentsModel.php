<?php

class Model_Maincomponents {
	static function getAllMaincomponents($db, $orderBy = 'k.PK_ID') {
		$mysqlResult = null;
		$maincomponent = array();
		$sql = '
			SELECT kart.Bezeichnung as Komponentenart, k.Seriennummer, k.Beschreibung, k.Hersteller, k.Einkaufsdatum, k.Gewaehrleistungsdauer, k.Einkaufsdatum + INTERVAL k.Gewaehrleistungsdauer YEAR as Ablaufdatum, k.Notiz, k.FK_Lieferant, k.FK_Raum, l.Name
			FROM komponente as k, komponentenart as kart, lieferant as l
			WHERE k.FK_Lieferant = l.PK_ID
			AND k.FK_Komponentenart = kart.PK_ID
			AND k.FK_Komponentenart = 1
			OR k.FK_Komponentenart = 19
			ORDER BY ' . $orderBy . '
		';

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		$mysqlResult->data_seek(0);
		while ($row = $mysqlResult->fetch_assoc()) {
			array_push($maincomponent, $row);
		}

		return $maincomponent;
	}
	static function getAllPCsbyroom($db, $roomnr, $orderBy = 'k.PK_ID') {
				$mysqlResult = null;
		$maincomponent = array();
		$sql = '
			SELECT kart.Bezeichnung as Komponentenart, k.Beschreibung, k.Hersteller, k.Einkaufsdatum, k.Gewaehrleistungsdauer, k.Einkaufsdatum + INTERVAL k.Gewaehrleistungsdauer YEAR as Ablaufdatum, k.Notiz, k.FK_Lieferant, k.FK_Raum, l.Name
			FROM komponente as k, komponentenart as kart, lieferant as l
			WHERE k.FK_Lieferant = l.PK_ID
			AND k.FK_Raum = '.$roomnr.'
			AND k.FK_Komponentenart = kart.PK_ID
			AND k.FK_Komponentenart = 1
			ORDER BY ' . $orderBy . '
		';

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		$mysqlResult->data_seek(0);
		while ($row = $mysqlResult->fetch_assoc()) {
			array_push($maincomponent, $row);
		}

		return $maincomponent;
	}
		
		
	static function createNewMaincomponent($db, $maincomponentdata){
		$mysqlResult = null;

		$sql = "
			INSERT INTO komponente (Beschreibung, Hersteller, Notiz, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
			VALUES ('".$maincomponentdata['Beschreibung']."','".$maincomponentdata['Hersteller']."','".$maincomponentdata['Notiz']."','".$maincomponentdata['Einkaufsdatum']."',".$maincomponentdata['Gewaehrleistungsdauer'].",'".$maincomponentdata['FK_Lieferant']."','".$maincomponentdata['FK_Komponentenart']."', '".$maincomponentdata['FK_Raum']."','".$maincomponentdata['Seriennummer']."')		
			";
		
		$mysqlResult = $db->query($sql);
		
		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		}
		
	}

