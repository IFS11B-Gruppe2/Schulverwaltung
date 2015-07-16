<?php
$tmp = explode('/', $_SERVER['SCRIPT_FILENAME']);
$script_filename = $tmp[count($tmp) - 1];

switch ($script_filename):
  case 'roomsListController.php':
  case 'roomsFormController.php':
		$roomsSelected = 'selected';
		break;
	case 'maincomponentsListController.php':
	case 'maincomponentsFormController.php':
		$maincomponentsSelected = 'selected';
		break;
	case 'subcomponentsListController.php':
	case 'subcomponentsFormController.php':
		$subcomponentsSelected = 'selected';
		break;
	case 'personaldataMenuController.php':
	case 'usersListController.php':
	case 'usersFormController.php':
	case 'suppliersListController.php':
	case 'suppliersFormController.php':
		$personaldataSelected = 'selected';
		break;
endswitch;
?>

<nav class="mainMenu">
	<a class="blueButton <?= $roomsSelected ?>" href="core/controllers/rooms/roomsListController.php"> Räume </a>
	<a class="blueButton <?= $maincomponentsSelected ?>" href="core/controllers/maincomponents/maincomponentsListController.php"> Hauptkomponenten </a>
	<a class="blueButton <?= $subcomponentsSelected ?>" href="core/controllers/subcomponents/subcomponentsListController.php"> Teilkomponenten </a>
	<a class="blueButton <?= $personaldataSelected ?>" href="core/controllers/personaldata/personaldataMenuController.php"> Stammdaten </a>
	<a class="redButton" href="core/logout.php"> Logout </a>
</nav>

<img class="logo" src="img/logo.png" />
