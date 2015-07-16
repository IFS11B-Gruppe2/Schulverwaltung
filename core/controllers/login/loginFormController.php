<?php
session_start();

$rootPath = '../../..';
require_once($rootPath . '/config/config.php');
require_once($rootPath . '/core/mysql.php');
require_once($rootPath . '/core/models/usersModel.php');

$db = getMysqlConnection();
$logindata = NULL;

if(isset($_POST['login'])) {

	$logindata = array(
		'name' => $_POST['benutzer'],
		'password' => $_POST['passwort'],
	);

	$users = Model_Users::getLoginUser($db, $logindata);

	if ($logindata['password'] == $users['password']) {
		$_SESSION['login'] = array(
			'username' => $users['username'],
			'group' => $users['group'],
			'date' => date("Y-m-d H:m:s")
		);
		header("Location: " . $CONFIG['webHost'] . "/core/controllers/rooms/roomsListController.php");
		die('Error: Redirection has not worked.');
	} else {
		die("login fehlgeschlagen");
	}

}

require_once($rootPath . '/views/login/loginform.php');
