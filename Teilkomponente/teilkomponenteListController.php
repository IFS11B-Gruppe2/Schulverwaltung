<?php 

$component=array(
	array(
		'Beschreibung' => 'PC01',
		'Beschreibung' => '28fgklsv',
		'Ausgelagert' => '10.24.7000',
		'FK_Komponentenart' => 'PC',
		'Ablaufdatum' => 'R002',
		'Einkaufsdatum' => '19.29.2019',
		'Hersteller' => 'Klaus',
		'FK_Lieferant' => 'Pool',
		'Notiz' => 'Nasdasdasd'),
	array(
		'Beschreibung' => 'PC02',
		'Beschreibung' => '28ftklsv',
		'Ausgelagert' => '10.24.7000',
		'FK_Komponentenart' => 'PC',
		'Ablaufdatum' => 'R003',
		'Einkaufsdatum' => '19.29.2019',
		'Hersteller' => 'Klaus',
		'FK_Lieferant' => 'Pool',
		'Notiz' => 'Nasdasdasd'),
		
	
	);

$view = array(
  'component' => $component
);


require_once('teilkomponenteListView.php');
?>