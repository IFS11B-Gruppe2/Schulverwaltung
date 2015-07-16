<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Stammdaten</title>

	<base href="<?= $CONFIG['webHost'] ?>/" />

	<link rel="stylesheet" type="text/css" href="css/libs/normalize-3.0.2.css" />
	<link rel="stylesheet" type="text/css" href="css/custom/classes.css" />
</head>
<body>

<?php require_once($view['rootPath'] . '/views/menu.php'); ?>

<nav>
	<ul>
		<li> <a href="core/controllers/personaldata/users/usersListController.php"> Benutzer </a> </li>
		<li> <a href="core/controllers/personaldata/suppliers/suppliersListController.php"> Lieferanten </a> </li>
	</ul>
</nav>

<?php require_once($view['rootPath'] . '/views/footer.html'); ?>

</body>
</html>
