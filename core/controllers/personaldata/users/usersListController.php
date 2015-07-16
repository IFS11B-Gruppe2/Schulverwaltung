<?php

$root = '../../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/login.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/usersModel.php');



$user = new Model_Users();


$db = getMysqlConnection();
$user = $user::getAllUsers($db);






$view = array(
  'user' => $user,
  'rootPath' => $root
);


require_once($root . '/views/personaldata/users/usersListView.php');
?>
