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
		<td> <input type="text" class="fit" name="txtDescription" /> </td>
		<td> <input type="text" class="fit" name="seriennummer" /> </td>
		<td> <input type="text" class="fit" name="ablaufdatum" /> </td>
		<td> <input type="text" class="fit" name="komponentenart" /> </td>
		<td> <input type="text" class="fit" name="raum" /> </td>
		<td> <input type="text" class="fit" name="einkaufdatum" /> </td>
		<td> <input type="text" class="fit" name="hersteller" /> </td>
		<td> <input type="text" class="fit" name="lieferant" /> </td>
		<td> <input type="text" class="fit" name="notiz" /> </td>
		<td> <input type="submit" name="suchen" value="Suchen" /> </td>
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
		<th colspan="2"> Notiz </th>
	</tr>

	<?php foreach($view['maincomponents'] as $index => $row): ?>
	<tr>
		<td> <?= $row['Beschreibung'] ?> </td>
		<td>
			<a href="core/controllers/maincomponents/maincomponentsFormController.php?Seriennummer=<?= $row['Seriennummer'] ?>">
				<?= $row['Seriennummer'] ?>
			</a>
		</td>
		<td> <?= $row['Ablaufdatum'] ?> </td>
		<td> <?= $row['Komponentenart'] ?> </td>
		<td> <?= str_pad($row['FK_Raum'], 3, "0", STR_PAD_LEFT) ?> </td>
		<td> <?= $row['Einkaufsdatum'] ?> </td>
		<td> <?= $row['Hersteller'] ?> </td>
		<td> <?= $row['Name'] ?> </td>
		<td colspan="2"> <?= $row['Notiz'] ?> </td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="10" class="centerText">
			<a class="actionButton" href="core/controllers/maincomponents/maincomponentsFormController.php">Neu</a>
		</td>
	</tr>
</table>

</body>
</html>
