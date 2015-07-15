<?php

require_once('config/config.php');

header("Location: " . $CONFIG['webHost'] . "/core/controllers/rooms/roomsListController.php");
die('Error: Redirection has not worked.');
