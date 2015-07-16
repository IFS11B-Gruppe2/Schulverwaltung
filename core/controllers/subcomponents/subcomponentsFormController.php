<?php

$rootPath = '../../..';
require_once($rootPath . '/config/config.php');
require_once($rootPath . '/core/login.php');
require_once($rootPath . '/core/mysql.php');
require_once($rootPath . '/core/models/subcomponentsModel.php');
require_once($rootPath . '/core/models/maincomponentsModel.php');

$db = getMysqlConnection();
$maincomponents = null;

$maincomponents = Model_Maincomponents::getAllMaincomponents($db);

if(isset($_POST['save'])) {
	/*
	$maincomponents = array(
		'Beschreibung' => $_POST['beschreibung'],
		'Seriennummer' => $_POST['seriennummer'],
		'Gewaehrleistungsdauer' => $_POST['gewaehrleistungsdauer'],
		'FK_Komponentenart' => $_POST['art'],
		'FK_Raum' => $_POST['raum'],
		'Einkaufsdatum' => $_POST['einkaufdatum'],
		'Hersteller' => $_POST['hersteller'],
		'FK_Lieferant' => $_POST['lieferant'],
		'Notiz' => $_POST['notiz']
	);

	Model_Maincomponents::createNewMaincomponent($db, $maincomponentdata);
	*/
}

$view = array(
	'maincomponentdata' => $maincomponents,
	'rootPath' => $rootPath
);

require_once($rootPath . '/views/maincomponents/maincomponentsFormView.php');
