<?php

$rootPath = '../../../..';
require_once($rootPath . '/config/config.php');
require_once($rootPath . '/core/login.php');
require_once($rootPath . '/core/mysql.php');
require_once($rootPath . '/core/models/usersModel.php');






$db = getMysqlConnection();
$userdata = NULL;



if (!isset($_GET['User'])) {
	$form = array(
		'username' => '',
		'password' => '',
		'FK_Group' => ''
	);
}else{
	$userdata = Model_Users::getUserByName($db, $_GET['User']);

$form = array(
		'username' => $userdata['username'],
		'password' => $userdata['password'],
		'FK_Group' => $userdata['FK_Group']
	);
}


if(isset($_POST['save']))
{
	if ($_POST['group']=='mitarbeiter')
	{
			$group = '1';
	} else if($_POST['group']=='administrator')
	{
		$group = '2';
	}

	$form['username'] = $_POST['benutzer'];
	$form['password'] = $_POST['passwort'];
	$form['FK_Group'] = $group;

if (!isset($_GET['User'])){
	$ok = Model_Users::createNewUser($db, $form);
	} else{
		$ok = Model_Users::updateUsers($db, $_GET['User'], $form);
	}

}

if (isset($_POST['delete']))
{
	$userdata = array(
	'name' => $_POST['benutzer'],
	'password' => $_POST['passwort'],
	);
	$ok = Model_Users::deleteUser($db, $userdata);

	if ($ok === true) {
		header("Location: " . $CONFIG['webHost'] . "/core/controllers/personaldata/users/usersListController.php");
		die('Error: Redirection has not worked.');
	}
}
$view = array(
  'userdata' => $userdata,
  'rootPath' => $rootPath,
	'saveOK' => (isset($ok)) ? $ok : null,
  'form' => $form
  );


require_once($rootPath . '/views/personaldata/users/usersFormView.php');
?>
