<?php

$root = '../../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/login.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/usersModel.php');






$db = getMysqlConnection();
$userdata = NULL;

if(isset($_POST['save']))
{
	if ($_POST['group']=='mitarbeiter')
	{
			$group = '1';
	} else if($_POST['group']=='administrator')
	{
		$group = '2';
	}

	$userdata = array(
		'name' => $_POST['benutzer'],
		'password' => $_POST['passwort'],
		'group' => $group
	);

	Model_Users::createNewUser($db, $userdata);
}
$view = array(
  'userdata' => $userdata,
  'rootPath' => $root
  );


require_once($root . '/views/personaldata/users/usersFormView.php');
?>
