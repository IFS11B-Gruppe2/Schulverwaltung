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

<form action="" method="POST">
	<?php if (isset($view['saveOK']) and $view['saveOK'] === true): ?>
	<p class="positiveMessage">
		Benutzer gespeichert!
	</p>
	<?php endif; ?>

	<table class="form">
		<tr>
			<td> Benutzer </td>
			<td> <input type="text" name="benutzer" value="<?= $view['form']['username'] ?>" /> </td>
		</tr>

		<tr>
			<td> Benutzergruppe </td>
			<td>
				<select name="group">
					<option value="mitarbeiter"> Mitarbeiter </option>
					<option value="administrator"> Administrator </option>
				</select>
			</td>
		</tr>

		<tr>
			<td> Passwort </td>
			<td> <input type="password" name="passwort" value="<?= $view['form']['password'] ?>"/> </td>
		</tr>

		<tr>
			<td>
				<input type="submit" class="actionButton" name="save" value="Speichern" />
			</td>
			<td>
				<?php if (isset($_GET['User'])): ?>
				<input type="submit" class="actionButton" name="delete" value="Löschen" />
				<?php endif; ?>

				<a class="actionButton" href="core/controllers/personaldata/users/usersListController.php">Zur&uuml;ck</a>
			</td>
		</tr>
	</table>
</form>

<?php require_once($view['rootPath'] . '/views/footer.html'); ?>

</body>
</html>
