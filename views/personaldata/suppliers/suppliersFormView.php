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
	<table class="form">
		<tr>
			<td> Lieferant </td>
			<td> <input type="text" name="lieferant" /> </td>
		</tr>

		<tr>
			<td> Stra&szlig;e </td>
			<td> <input type="text" name="strasse" /> </td>
		</tr>

		<tr>
			<td> Hausnummer </td>
			<td> <input type="number" name="hausnummer" /> </td>
		</tr>

		<tr>
			<td> Ort </td>
			<td> <input type="text" name="ort" /> </td>
		</tr>

		<tr>
			<td> PLZ </td>
			<td> <input type="number" name="plz" /> </td>
		</tr>

		<tr>
			<td> E-Mail Adresse </td>
			<td> <input type="text" name="email" /> </td>
		</tr>

		<tr>
			<td> Telefonnummer </td>
			<td> <input type="number" name="telefon" /> </td>
		</tr>

		<tr>
			<td> Notiz </td>
			<td> <input type="text" name="notiz" /> </td>
		</tr>

		<tr>
			<td colspan="2" class="centerText">
				<input type="submit" class="actionButton" name="save" value="Speichern">
			</td>
		</tr>
	</table>
</form>

</body>
</html>
