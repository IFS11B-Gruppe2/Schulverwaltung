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
			<td> Hauptkomponente </td>
			<td>
				<select name="komponente">
					<option disabled selected></option>
					<option value="1"> PC01 </option>
					<option value="2"> PC02 </option>
					<option value="3"> PC03 </option>
					<option value="4"> PC04 </option>
					<option value="5"> PC05 </option>
					<option value="6"> PC06 </option>
				</select>
			</td>
		</tr>

		<tr>
			<td> Gewaehrleistungsdauer </td>
			<td> <input type="int" name="gewaehrleistungsdauer" /> </td>
		</tr>

		<tr>
			<td> Ausgelagert </td>
			<td> <input type="text" name="ausgelagert" /> </td>
		</tr>

		<tr>
			<td> Komponentenart </td>
			<td>
				<select name="art">
					<option disabled selected></option>
					<option value="2"> RAM </option>
					<option value="3"> CPU </option>
					<option value="4"> Mainboard </option>
					<option value="5"> Festplatte </option>
					<option value="6"> Grafikkarte </option>
					<option value="7"> Netzwerkkarte </option>
					<option value="8"> Raidcontroller </option>
					<option value="9"> CD -ROM</option>
					<option value="10"> CD -Brenner</option>
					<option value="11"> DVD -ROM</option>
					<option value="12"> DVD -Brenner</option>
					<option value="13"> Netzteil </option>
					<option value="14"> Switch </option>
					<option value="15"> VLAN </option>
					<option value="16"> Router </option>
					<option value="17"> Hub </option>
					<option value="18"> Accesspoint </option>
					<option value="20"> Software </option>
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
				<input type="submit" class="actionButton" name="save" value="Speichern" />
			</td>
		</tr>
	</table>
</form>

</body>
</html>
