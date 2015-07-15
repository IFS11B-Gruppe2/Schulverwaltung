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
			<td> Beschreibung </td>
			<td> <input type="text" name="beschreibung" /> </td>
		</tr>

		<tr>
			<td> Seriennummer </td>
			<td> <input type="text" name="seriennummer" /> </td>
		</tr>

		<tr>
			<td> Gewaehrleistungsdauer </td>
			<td> <input type="int" name="gewaehrleistungsdauer" /> </td>
		</tr>

		<tr>
			<td> Komponentenart </td>
			<td>
				<select name="art">
					<option disabled selected></option>
					<option value="1"> PC </option>
					<option value="19"> Drucker </option>
				</select>
			</td>
		</tr>

		<tr>
			<td> Raum </td>
			<td>
				<select name="raum">
					<option disabled selected></option>
					<option value="0"> Ausgemustert </option>
					<option value="1"> R001 </option>
					<option value="2"> R002 </option>
					<option value="112"> R112 </option>
					<option value="116"> R116 </option>
					<option value="301"> R301 </option>
				</select>
			</td>
		</tr>

		<tr>
			<td> Einkaufdatum </td>
			<td> <input type="date" name="einkaufdatum" /> </td>
		</tr>

		<tr>
			<td> Hersteller </td>
			<td> <input type="text" name="hersteller" /> </td>
		</tr>

		<tr>
			<td> Lieferant </td>
			<td>
				<select name="lieferant">
					<option disabled selected></option>
					<option value="1"> Sinell EDV Zubehoer GmbH </option>
					<option value="2"> Ingram Micro Distrubution GmbH </option>
					<option value="3"> proMX GmbH </option>
				</select>
			</td>
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
