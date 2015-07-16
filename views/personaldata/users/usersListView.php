<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<base href="<?= $CONFIG['webHost'] ?>/" />

	<link rel="stylesheet" type="text/css" href="css/libs/normalize-3.0.2.css" />
	<link rel="stylesheet" type="text/css" href="css/custom/classes.css" />
</head>
<body>

<?php require_once($view['rootPath'] . '/views/menu.php'); ?>

<table class="data evenRows">
	<tr>
		<th> Benutzer </th>
		<th> Benutzergruppe </th>
	</tr>

	<?php foreach($view['user'] as $index => $row): ?>
	<tr>
		<td>
		<a href="core/controllers/personaldata/users/usersFormController.php?User=<?= $row['username'] ?>">
				<?= $row['username'] ?>
			</a>
		</td>
		<td>
		<?php if ($row['FK_Group'] == '1'): ?>
			Administrator
		<?php elseif ($row['FK_Group'] == '2'): ?>
			Mitarbeiter
		<?php endif; ?>
		</td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="2" class="centerText">
			<a class="actionButton" href="core/controllers/personaldata/users/usersFormController.php">Neu</a>
		</td>
	</tr>
</table>

<?php require_once($view['rootPath'] . '/views/footer.html'); ?>

</body>
</html>
