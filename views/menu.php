<?php
$tmp = explode('/', $_SERVER['SCRIPT_FILENAME']);
$script_filename = $tmp[count($tmp) - 1];

switch ($script_filename):
  case 'roomsListController.php':
		$roomsSelected = 'selected';
		break;
	case 'maincomponentsListController.php':
		$maincomponentsSelected = 'selected';
		break;
	case 'subcomponentsListController.php':
		$subcomponentsSelected = 'selected';
		break;
	case 'personaldataListController.php':
		$personaldataSelected = 'selected';
		break;
endswitch;
?>

<nav class="mainMenu">
	<a class="blueButton <?= $roomsSelected ?>" href="core/controllers/rooms/roomsListController.php"> Räume </a>
	<a class="blueButton <?= $maincomponentsSelected ?>" href="core/controllers/maincomponents/maincomponentsListController.php"> Hauptkomponenten </a>
	<a class="blueButton <?= $subcomponentsSelected ?>" href="core/controllers/subcomponents/subcomponentsListController.php"> Teilkomponenten </a>
	<a class="blueButton <?= $personaldataSelected ?>" href="core/controllers/personaldata/personaldataMenuController.php"> Stammdaten </a>
	<a class="redButton" href="core/controllers/logout/logout.php"> Logout </a>
</nav>
