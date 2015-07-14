<?php 

$maincomponent=array(
	array(
		'Beschreibung' => 'PC01',
		'Seriennummer' => '28fgklsv',
		'Ablaufdatum' => '10.24.7000',
		'FK_Komponentenart' => 'PC',
		'FK_Raum' => 'R002',
		'Einkaufsdatum' => '19.29.2019',
		'Hersteller' => 'Klaus',
		'FK_Lieferant' => 'Pool',
		'Notiz' => 'Nasdasdasd'),
	array(
		'Beschreibung' => 'PC02',
		'Seriennummer' => '28fgklsv',
		'Ablaufdatum' => '10.24.7000',
		'FK_Komponentenart' => 'PC',
		'FK_Raum' => 'R003',
		'Einkaufsdatum' => '19.29.2019',
		'Hersteller' => 'Klaus',
		'FK_Lieferant' => 'Pool',
		'Notiz' => 'Nasdasdasd'),
		
	
	);

$view = array(
  'maincomponent' => $maincomponent
);


require_once('hauptkomponenteListView.php');
?>