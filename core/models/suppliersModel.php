<?php

class Model_Suppliers {
	static function getAllSuppliers($db, $orderBy = 'PK_ID') {
		$mysqlResult = null;
		$supplier = array();
		$sql = '
			SELECT *
			FROM lieferant
			WHERE disabled IS NULL
			ORDER BY ' . $orderBy . '
		';

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		$mysqlResult->data_seek(0);
		while ($row = $mysqlResult->fetch_assoc()) {
			array_push($supplier, $row);
		}

		return $supplier;
	}

	static function getSupplierByName($db, $Name) {
	$mysqlResult = null;
		$supplier = null;
		$sql = "
			SELECT *
			FROM lieferant
			WHERE Name = '".$Name."'
			";

		$mysqlResult = $db->query($sql);
		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		$mysqlResult->data_seek(0);
		$supplier = $mysqlResult->fetch_assoc();

		return $supplier;
	}

	static function createNewSupplier($db, $supplierdata) {
		$mysqlResult = null;

		$sql = "
			INSERT INTO lieferant (Name, Strasse, Hausnr, Ort, PLZ, Email, Telefon, Notiz)
			VALUES ('".$supplierdata['Name']."','".$supplierdata['Strasse']."',".$supplierdata['Hausnr'].",'".$supplierdata['Ort']."',".$supplierdata['PLZ'].",'".$supplierdata['Email']."',".$supplierdata['Telefon'].", '".$supplierdata['Notiz']."')
		";

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}
	}

	static function updateSuppliers($db, $name, $supplierdata){
		$mysqlResult = null;

		$sql = "
			UPDATE lieferant
			SET
				Name = '" . $supplierdata['Name'] . "',
				Strasse = '" . $supplierdata['Strasse'] . "',
				Hausnr = '" . $supplierdata['Hausnr'] . "',
				Ort = '" . $supplierdata['Ort'] . "',
				PLZ = ".$supplierdata['PLZ'].",
				Email = '" . $supplierdata['Email'] . "',
				Telefon = '" . $supplierdata['Telefon'] . "',
				Notiz = '". $supplierdata['Notiz'] ."'
			WHERE
				Name = '" . $name . "'
			;
		";

		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		return true;
	}
	
	static function disableSupplier($db, $form){
		$sql = "
			UPDATE lieferant
			SET
				disabled=1
			WHERE
				Name = '" . $form['Name'] . "'
			;
		";
		
		$mysqlResult = $db->query($sql);

		if ($mysqlResult === false) {
			die("sql query failed: (" . $db->errno . ") " . $db->error);
		}

		return true;
	}

}
