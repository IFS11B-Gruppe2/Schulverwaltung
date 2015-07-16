<?php

class Model_Subcomponents {
	static function getAllSubcomponents($db, $orderBy = 'k.PK_ID') {
		$mysqlResult = null;
		$subcomponent = array();
		$sql = "
			SELECT kart.Bezeichnung as Komponentenart, k.Beschreibung, k.Hersteller, k.Einkaufsdatum, k.Einkaufsdatum + INTERVAL k.Gewaehrleistungsdauer YEAR as Ablaufdatum, k.Gewaehrleistungsdauer, k.Notiz, k.FK_Lieferant, k.FK_Raum, l.Name,
			(	SELECT IF(komzvor.FK_Vorgang = 1, hauptk.Seriennummer, '')
				FROM komponente hauptk
				JOIN komponentezuvorgang as komzvor
				ON hauptk.PK_ID = komzvor.FK_Hauptkomponente
				WHERE komzvor.FK_Teilkomponente = k.PK_ID
				ORDER BY komzvor.Datum DESC
				LIMIT 1) as Seriennummer
			FROM komponente as k
			JOIN komponentenart as kart
			ON k.FK_Komponentenart = kart.PK_ID
			JOIN lieferant as l 
			ON k.FK_Lieferant = l.PK_ID		
			WHERE (k.FK_Komponentenart != 1
			AND k.FK_Komponentenart != 14
			AND k.FK_Komponentenart != 16
			AND k.FK_Komponentenart != 17
			AND k.FK_Komponentenart != 18
			AND k.FK_Komponentenart != 19)
		";

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
	
	static function getSearchSubcomponents($db, $searchdata, $orderBy = 'k.PK_ID')
	{
				$mysqlResult = null;
		$subcomponent = array();
		$sql = "
			SELECT kart.Bezeichnung as Komponentenart, k.Beschreibung, k.Hersteller, k.Einkaufsdatum, k.Einkaufsdatum + INTERVAL k.Gewaehrleistungsdauer YEAR as Ablaufdatum, k.Gewaehrleistungsdauer, k.Notiz, k.FK_Lieferant, k.FK_Raum, l.Name,
			(	SELECT IF(komzvor.FK_Vorgang = 1, hauptk.Seriennummer, '')
				FROM komponente hauptk
				JOIN komponentezuvorgang as komzvor
				ON hauptk.PK_ID = komzvor.FK_Hauptkomponente
				WHERE komzvor.FK_Teilkomponente = k.PK_ID
				ORDER BY komzvor.Datum DESC
				LIMIT 1) as Seriennummer
			FROM komponente as k
			JOIN komponentenart as kart
			ON k.FK_Komponentenart = kart.PK_ID
			JOIN lieferant as l 
			ON k.FK_Lieferant = l.PK_ID		
			WHERE (k.FK_Komponentenart != 1
			AND k.FK_Komponentenart != 14
			AND k.FK_Komponentenart != 16
			AND k.FK_Komponentenart != 17
			AND k.FK_Komponentenart != 18
			AND k.FK_Komponentenart != 19)		
		";
			
		if(isset($searchdata['bescheibung']))
		$sql .= "AND k.Beschreibung LIKE '%".$searchdata['bescheibung']."%'";
		
		if(isset($searchdata['komponentenart']))
		$sql .= "AND kart.Bezeichnung LIKE '%".$searchdata['komponentenart']."%'";
	
		if(isset($searchdata['einkaufdatum']))
		$sql .= "AND k.Einkaufsdatum LIKE '%".$searchdata['einkaufdatum']."%'";
	
		if(isset($searchdata['lieferant']))
		$sql .= "AND l.Name LIKE '%".$searchdata['lieferant']."%'";

		if(isset($searchdata['hersteller']))
		$sql .= "AND k.Hersteller LIKE '%".$searchdata['hersteller']."%'";
	

		$sql .= "		ORDER BY '" . $orderBy . "'";
		
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

