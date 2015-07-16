<?php

session_start();

$root = '../../..';
require_once($root . '/config/config.php');

if (!isset($_SESSION['login'])) {
	header("Location: " . $CONFIG['webHost'] . "/core/controllers/login/loginFormController.php");
	die('Error: Redirection has not worked.');
}
