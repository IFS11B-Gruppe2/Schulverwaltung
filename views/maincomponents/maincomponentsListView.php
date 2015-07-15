<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<base href="http://localhost/Schulverwaltung/" />

	<link rel="stylesheet" type="text/css" href="css/libs/normalize-3.0.2.css" />
	<link rel="stylesheet" type="text/css" href="css/custom/classes.css" />
</head>
<body>

<?php require_once($view['rootPath'] . '/views/menu.php'); ?>
<form action="" method="POST">
<table class="data evenRows">
	<tr>
		<td> <input type="text" name="bescheibung"> </td>
		<td> <input type="text" name="seriennummer" > </td>
		<td> <input type="text" name="ablaufdatum" > </td>
		<td> <input type="text" name="komponentenart" > </td>
		<td> <input type="text" name="raum" > </td>
		<td> <input type="text" name="einkaufdatum" > </td>
		<td> <input type="text" name="hersteller" > </td>
		<td> <input type="text" name="lieferant" > </td>
		<td> <input type="text" name="notiz"> </td>
		<td> <input type="submit" name="suchen" value="Suchen"> </td>
	</tr>

	<tr>
		<th> Beschreibung </th>
		<th> Seriennummer </th>
		<th> Ablaufdatum </th>
		<th> Komponentenart </th>
		<th> Raum </th>
		<th> Einkaufdatum </th>
		<th> Hersteller </th>
		<th> Lieferant </th>
		<th> Notiz </th>
	</tr>

	<?php foreach($view['maincomponent'] as $index => $row): ?>
	<tr>
		<td> <?= $row['Beschreibung'] ?> </td>
		<td> <?= $row['Seriennummer'] ?> </td>
		<td> <?= $row['Ablaufdatum'] ?> </td>
		<td> <?= $row['Komponentenart'] ?> </td>
		<td> <?= str_pad($row['FK_Raum'], 3, "0", STR_PAD_LEFT) ?> </td>
		<td> <?= $row['Einkaufsdatum'] ?> </td>
		<td> <?= $row['Hersteller'] ?> </td>
		<td> <?= $row['Name'] ?> </td>
		<td> <?= $row['Notiz'] ?> </td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="11" align="right">
			<a href="core/controllers/maincomponents/maincomponentsFormController.php">Neu</a>
		</td>
	</tr>
</table>
</form>
</body>
</html>
