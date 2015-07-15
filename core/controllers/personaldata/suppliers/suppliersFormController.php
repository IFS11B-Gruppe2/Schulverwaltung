<?php

$root = '../../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/suppliersModel.php');






$db = getMysqlConnection();
$supplierdata = NULL;

if(isset($_POST['save']))
{

	$supplierdata = array(
		'Name' => $_POST['lieferant'],
		'Strasse' => $_POST['strasse'],
		'Hausnr' => $_POST['hausnummer'],
		'Ort' => $_POST['ort'],
		'PLZ' => $_POST['plz'],
		'Email' => $_POST['email'],
		'Telefon' => $_POST['telefon'],
		'Notiz' => $_POST['notiz']
	);

	Model_Suppliers::createNewSupplier($db, $supplierdata);
}
$view = array(
  'supplierdata' => $supplierdata,
  'rootPath' => $root
  );


require_once($root . '/views/personaldata/suppliers/suppliersFormView.php');
?>
