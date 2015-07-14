<?php 

$rooms=array(
  array(
	'PK_Raumnr' => 'R002',
	'pc_anzahl' => '20',
	'drucker_anzahl' => '1',
	'beamer_anzahl' => '1',
	'Stockwerk' => 'EG',
	'ip_adress' => '192.168.1.0/192.168.1.20',
	'Notiz' => 'asduidhasuohasd'),
	array(
	'PK_Raumnr' => 'R003',
	'pc_anzahl' => '20',
	'drucker_anzahl' => '1',
	'beamer_anzahl' => '1',
	'Stockwerk' => 'OG01',
	'ip_adress' => '192.168.2.0/192.168.2.20',
	'Notiz' => 'asduidhasuohasd'));
	
	

$view = array(
  'rooms' => $rooms
);


require_once('raumListView.php');
?>