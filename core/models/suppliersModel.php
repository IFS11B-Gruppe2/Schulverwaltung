<?php

class Model_Suppliers {
	static function getAllSuppliers($db, $orderBy = 'PK_ID') {
		$mysqlResult = null;
		$supplier = array();
		$sql = '
			SELECT *
			FROM lieferant
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
static function createNewSupplier($db, $supplierdata){
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
	
}
