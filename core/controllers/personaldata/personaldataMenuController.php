<?php

$rootPath = '../../..';
require_once($rootPath . '/config/config.php');
require_once($root . '/core/login.php');

$view = array(
	'rootPath' => $rootPath
);

require_once($rootPath . '/views/personaldata/personalDataMenuView.php');
