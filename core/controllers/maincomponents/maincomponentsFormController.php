<?php

$root = '../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/maincomponentsModel.php');

$db = getMysqlConnection();
$maincomponentdata = NULL;

if (!isset($_GET['Seriennummer'])) {
	$form = array(
		'txtDescription' => '',
		'txtSerialNumber' => '',
		'txtWarrantyYears' => '',
		'cmbComponentType' => '',
		'cmbRaumNumber' => '',
		'txtBuyDate' => '',
		'txtManufacturer' => '',
		'cmbSupplierID' => '',
		'txtNote' => ''
	);
} else {
	$maincomponentdata = Model_Maincomponents::getMaincomponentBySerialNumber($db, $_GET['Seriennummer']);
var_dump($maincomponentdata);
	$form = array(
		'txtDescription' => $maincomponentdata['Beschreibung'],
		'txtSerialNumber' => $maincomponentdata['Seriennummer'],
		'txtWarrantyYears' => $maincomponentdata['Gewaehrleistungsdauer'],
		'cmbComponentType' => $maincomponentdata['Komponentenart'],
		'cmbRaumNumber' => $maincomponentdata['FK_Raum'],
		'txtBuyDate' => $maincomponentdata['Einkaufsdatum'],
		'txtManufacturer' => $maincomponentdata['Hersteller'],
		'cmbSupplierID' => $maincomponentdata['FK_Lieferant'],
		'txtNote' => $maincomponentdata['Notiz']
	);
}

if(isset($_POST['btnSave'])) {

	$form['txtDescription'] = $_POST['txtDescription'];
	$form['txtSerialNumber'] = $_POST['txtSerialNumber'];
	$form['txtWarrantyYears'] = $_POST['txtWarrantyYears'];
	$form['cmbComponentType'] = $_POST['cmbComponentType'];
	$form['cmbRaumNumber'] = $_POST['cmbRaumNumber'];
	$form['txtBuyDate'] = $_POST['txtBuyDate'];
	$form['txtManufacturer'] = $_POST['txtManufacturer'];
	$form['cmbSupplierID'] = $_POST['cmbSupplierID'];
	$form['txtNote'] = $_POST['txtNote'];

	Model_Maincomponents::createNewMaincomponent($db, $maincomponentdata);
}

$view = array(
	'maincomponentdata' => $maincomponentdata,
	'form' => $form,
	'rootPath' => $root
);

require_once($root . '/views/maincomponents/maincomponentsFormView.php');
