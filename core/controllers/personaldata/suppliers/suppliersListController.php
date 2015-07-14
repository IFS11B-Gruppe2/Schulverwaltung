<?php

$root = '../../../..';
require_once($root . '/config/config.php');
require_once($root . '/core/mysql.php');
require_once($root . '/core/models/suppliersModel.php');



$supplier = new Model_Suppliers();


$db = getMysqlConnection();
$supplier = $supplier::getAllSuppliers($db);

$view = array(
  'supplier' => $supplier,
  'rootPath' => $root
);


require_once($root . '/views/personaldata/suppliers/suppliersListView.php');
?>
