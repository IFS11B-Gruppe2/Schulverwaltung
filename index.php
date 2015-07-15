<?php

require_once('config/config.php');

header("Location: $webProtocol$webHost/core/controllers/rooms/roomsListController.php");
die('Error: Redirection has not worked.');
