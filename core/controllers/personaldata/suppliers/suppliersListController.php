<?php

$rootPath = '../../../..';
require_once($rootPath . '/config/config.php');
require_once($rootPath . '/core/login.php');
require_once($rootPath . '/core/mysql.php');
require_once($rootPath . '/core/models/suppliersModel.php');



$supplier = new Model_Suppliers();


$db = getMysqlConnection();
$supplier = $supplier::getAllSuppliers($db);

$view = array(
  'supplier' => $supplier,
  'rootPath' => $rootPath
);


require_once($rootPath . '/views/personaldata/suppliers/suppliersListView.php');
?>
