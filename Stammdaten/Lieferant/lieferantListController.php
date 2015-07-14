<?php 

$supplier=array(
  array(
	'Name' => 'Inder',
	'Strasse' => 'Obstgarten',
	'Hausnr' => '27',
	'Ort' => 'Schlawineshausen',
	'PLZ' => '90545',
	'Email' => 'info@uuu.de',
	'Telefon' => '09123478',
	'Notiz' => 'asdklasd'),
	
  array(
	'Name' => 'UFO',
	'Strasse' => 'Karten',
	'Hausnr' => '77',
	'Ort' => 'Haup',
	'PLZ' => '94445',
	'Email' => 'info@kkk.de',
	'Telefon' => '091531478',
	'Notiz' => 'asdklasd'),
	);
	

$view = array(
  'supplier' => $supplier
);


require_once('lieferantListView.php');
?>