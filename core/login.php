<?php

session_start();

require_once($rootPath . '/config/config.php');

if (!isset($_SESSION['login'])) {
	header("Location: " . $CONFIG['webHost'] . "/core/controllers/login/loginFormController.php");
	die('Error: Redirection has not worked.');
}
