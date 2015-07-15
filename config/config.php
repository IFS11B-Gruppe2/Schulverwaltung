<?php

$ENV = 'PROD'; # PROD | DEV

if ($ENV == 'PROD') {
	$webProtocol = 'https://';
	$webHost = 'schulverwaltung.martinsegitz.org';
} else {
	$webProtocol = 'http://';
	$webHost = 'localhost/Schulverwaltung';
}

$database = array(
	'host' => 'localhost',
	'database' => 'stammdatenverwaltung',
	'users' => array(
		'user' => array(
			'username' => 'M1t4rb31t3r',
			'password' => 'n3D5Lp6Yq9KxYd7B'
		),
		'systemadmin' => array(
			'username' => 'Syst3m4dm1n',
			'password' => 'pnQxQRxdtQcFRK2r'
		)
	)
);


// public access
$CONFIG = array(
	'database' => $database
);
