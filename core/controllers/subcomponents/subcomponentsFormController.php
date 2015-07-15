<?php

$root = '../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/subcomponentsModel.php');
require_once($root . '/core/models/maincomponentsModel.php');




$db = getMysqlConnection();
$maincomponentdata = NULL;

$maincomponents = Model_Maincomponents::getAllMaincomponents();
if(isset($_POST['save']))
{






	$maincomponentdata = array(
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
}
$view = array(
  'maincomponentdata' => $maincomponentdata,
  'rootPath' => $root
  );


require_once($root . '/views/maincomponents/maincomponentsFormView.php');
?>
