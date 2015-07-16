<?php

$rootPath = '../../../..';
require_once($rootPath . '/config/config.php');
require_once($rootPath . '/core/login.php');
require_once($rootPath . '/core/mysql.php');
require_once($rootPath . '/core/models/usersModel.php');



$user = new Model_Users();


$db = getMysqlConnection();
$user = $user::getAllUsers($db);






$view = array(
  'user' => $user,
  'rootPath' => $rootPath
);


require_once($rootPath . '/views/personaldata/users/usersListView.php');
?>
