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
			<td> Lieferant </td>
			<td> <input type="text" name="lieferant" value="<?= $view['form']['Name'] ?>"/> </td>
		</tr>

		<tr>
			<td> Stra&szlig;e </td>
			<td> <input type="text" name="strasse"  value="<?= $view['form']['Strasse'] ?>"/> </td>
		</tr>

		<tr>
			<td> Hausnummer </td>
			<td> <input type="number" name="hausnummer" value="<?= $view['form']['Hausnr'] ?>"/> </td>
		</tr>

		<tr>
			<td> Ort </td>
			<td> <input type="text" name="ort" value="<?= $view['form']['Ort'] ?>"/> </td>
		</tr>

		<tr>
			<td> PLZ </td>
			<td> <input type="number" name="plz" value="<?= $view['form']['PLZ'] ?>"/> </td>
		</tr>

		<tr>
			<td> E-Mail Adresse </td>
			<td> <input type="text" name="email" value="<?= $view['form']['Email'] ?>"/> </td>
		</tr>

		<tr>
			<td> Telefonnummer </td>
			<td> <input type="number" name="telefon" value="<?= $view['form']['Telefon'] ?>"/> </td>
		</tr>

		<tr>
			<td> Notiz </td>
			<td> <input type="text" name="notiz" value="<?= $view['form']['Notiz'] ?>"/> </td>
		</tr>

		<tr>
			<td>
				<input type="submit" class="actionButton" name="btnSave" value="Speichern">
			</td>
			<td>
				<?php if (isset($_GET['Lieferant'])): ?>
				<input type="submit" class="actionButton" name="delete" value="Löschen">
				<?php endif; ?>

				<a class="actionButton" href="core/controllers/personaldata/suppliers/suppliersListController.php">Zur&uuml;ck</a>
			</td>
		</tr>
	</table>
</form>

<?php require_once($view['rootPath'] . '/views/footer.html'); ?>

</body>
</html>
