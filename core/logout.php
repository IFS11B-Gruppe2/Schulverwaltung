<?php

session_start();

$rootPath = '..';
require_once($rootPath . '/config/config.php');

unset($_SESSION['login']);

header("Location: " . $CONFIG['webHost'] . "/core/controllers/login/loginFormController.php");
die('Error: Redirection has not worked.');
