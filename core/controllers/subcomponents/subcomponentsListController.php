<?php

$rootPath = '../../..';
require_once($rootPath . '/config/config.php');
require_once($rootPath . '/core/login.php');
require_once($rootPath . '/core/mysql.php');
require_once($rootPath . '/core/models/subcomponentsModel.php');


$subcomponent = new Model_Subcomponents();
$db = getMysqlConnection();

if (isset($_POST['suchen']))
{
	$searchdata = array();
	if(isset($_POST['bescheibung']))
	{$searchdata['bescheibung']=  $_POST['bescheibung'];}
	if(isset($_POST['hauptkomponente']))
	{$searchdata['hauptkomponente']=  $_POST['hauptkomponente'];}
	if(isset($_POST['ausgelagert']))
	{$searchdata['ausgelagert']=  $_POST['ausgelagert'];}
	if(isset($_POST['komponentenart']))
	{$searchdata['komponentenart']=  $_POST['komponentenart'];}
	if(isset($_POST['einkaufdatum']))
	{$searchdata['einkaufdatum']=  $_POST['einkaufdatum'];}
	if(isset($_POST['lieferant']))
	{$searchdata['lieferant']=  $_POST['lieferant'];}
	if(isset($_POST['notiz']))
	{$searchdata['notiz']=  $_POST['notiz'];}
	if(isset($_POST['hersteller']))
	{$searchdata['hersteller']=  $_POST['hersteller'];}



	$subcomponent = $subcomponent::getSearchSubcomponents($db, $searchdata);
}else
{
	$subcomponent = $subcomponent::getAllSubcomponents($db);
}




$view = array(
  'component' => $subcomponent,
  'rootPath' => $rootPath
);


require_once($rootPath . '/views/subcomponents/subcomponentsListView.php');
?>
