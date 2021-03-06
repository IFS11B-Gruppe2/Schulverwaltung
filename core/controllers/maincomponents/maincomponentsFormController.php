<?php

$rootPath = '../../..';
require_once($rootPath . '/config/config.php');
require_once($rootPath . '/core/login.php');
require_once($rootPath . '/core/mysql.php');
require_once($rootPath . '/core/models/maincomponentsModel.php');
require_once($rootPath . '/core/models/roomsModel.php');
require_once($rootPath . '/core/models/suppliersModel.php');

$db = getMysqlConnection();
$maincomponentdata = NULL;

$maincomponentTypes = Model_Maincomponents::getMaincomponentTypes($db);
$rooms = Model_Rooms::getAllRooms($db);
$suppliers = Model_Suppliers::getAllSuppliers($db);

if (!isset($_GET['Seriennummer'])) {
	$form = array(
		'txtDescription' => '',
		'txtSerialNumber' => '',
		'txtWarrantyYears' => '',
		'cmbComponentType' => '',
		'cmbRoomNumber' => '',
		'txtBuyDate' => '',
		'txtManufacturer' => '',
		'cmbSupplierID' => '',
		'txtNote' => '',
		'txtHowMuch' => ''
	);
} else {
	$maincomponentdata = Model_Maincomponents::getMaincomponentBySerialNumber($db, $_GET['Seriennummer']);

	$form = array(
		'txtDescription' => $maincomponentdata['Beschreibung'],
		'txtSerialNumber' => $maincomponentdata['Seriennummer'],
		'txtWarrantyYears' => $maincomponentdata['Gewaehrleistungsdauer'],
		'cmbComponentType' => $maincomponentdata['FK_Komponentenart'],
		'cmbRoomNumber' => $maincomponentdata['FK_Raum'],
		'txtBuyDate' => $maincomponentdata['Einkaufsdatum'],
		'txtManufacturer' => $maincomponentdata['Hersteller'],
		'cmbSupplierID' => $maincomponentdata['FK_Lieferant'],
		'txtNote' => $maincomponentdata['Notiz'],
		'txtHowMuch' => ''
	);
}

if(isset($_POST['btnSave'])) {
	$form['txtDescription'] = $_POST['txtDescription'];
	$form['txtSerialNumber'] = $_POST['txtSerialNumber'];
	$form['txtWarrantyYears'] = $_POST['txtWarrantyYears'];
	$form['cmbComponentType'] = $_POST['cmbComponentType'];
	$form['cmbRoomNumber'] = $_POST['cmbRoomNumber'];
	$form['txtBuyDate'] = $_POST['txtBuyDate'];
	$form['txtManufacturer'] = $_POST['txtManufacturer'];
	$form['cmbSupplierID'] = $_POST['cmbSupplierID'];
	$form['txtNote'] = $_POST['txtNote'];
	$form['txtHowMuch'] = $_POST['txtHowMuch'];

	$i = (!empty($_POST['txtHowMuch'])) ? $_POST['txtHowMuch'] : 0;

	do {
		if (!isset($_GET['Seriennummer'])) {
			$ok = Model_Maincomponents::createNewMaincomponent($db, $form);
		} else {
			$ok = Model_Maincomponents::updateMaincomponent($db, $_GET['Seriennummer'], $form);
		}

		$i--;
	} while($i > 0);
}

if (isset($_POST['delete'])) {
	$ok = Model_Maincomponents::deleteMaincomponent($db, $_GET['Seriennummer']);

	if ($ok === true) {
		header("Location: " . $CONFIG['webHost'] . "/core/controllers/maincomponents/maincomponentsListController.php");
		die('Error: Redirection has not worked.');
	}
}

$view = array(
	'form' => $form,
	'maincomponentTypes' => $maincomponentTypes,
	'saveOK' => (isset($ok)) ? $ok : null,
	'rooms' => $rooms,
	'rootPath' => $rootPath,
	'suppliers' => $suppliers
);

require_once($rootPath . '/views/maincomponents/maincomponentsFormView.php');
