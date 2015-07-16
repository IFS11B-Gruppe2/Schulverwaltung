<?php

$root = '../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/maincomponentsModel.php');

$db = getMysqlConnection();
	$maincomponents = Model_Maincomponents::getAllMaincomponents($db);
 

if (isset($_GET['PK_Raumnr'])) {
	$maincomponents = Model_Maincomponents::getMaincomponentsByRoomNumber($db, $_GET['PK_Raumnr']);
} else if (isset($_POST['suchen']))
{
	$searchdata = array();
	if(isset($_POST['txtDescription']))
	$searchdata['txtDescription']= $_POST['txtDescription'];
	if(isset($_POST['seriennummer']))
	$searchdata['seriennummer']=  $_POST['seriennummer'];
	if(isset($_POST['komponentenart']))
	{$searchdata['komponentenart']= $_POST['komponentenart'];}
	if(isset($_POST['raum']))
	{$searchdata['raum']=  $_POST['raum'];}
	if(isset($_POST['einkaufdatum']))
	{$searchdata['einkaufdatum']=  $_POST['einkaufdatum'];}
	if(isset($_POST['hersteller']))
	{$searchdata['hersteller']= $_POST['hersteller'];}
	if(isset($_POST['lieferant']))
	{$searchdata['lieferant']=  $_POST['lieferant'];}

	$maincomponents = Model_Maincomponents::getSearchMaincomponents($db, $searchdata);
	}else
	{
	$maincomponents = Model_Maincomponents::getAllMaincomponents($db);
	}







$view = array(
  'maincomponents' => $maincomponents,
  'rootPath' => $root
);

require_once($root . '/views/maincomponents/maincomponentsListView.php');
