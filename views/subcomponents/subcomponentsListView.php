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
<table class="data evenRows">
	<tr>
		<td> <input type="text" class="fit" name="bescheibung" /> </td>
		<td> <input type="text" class="fit" name="hauptkomponente" /> </td>
		<td> <input type="text" class="fit" name="ausgelagert" /> </td>
		<td> <input type="text" class="fit" name="komponentenart" /> </td>
		<td> <input type="text" class="fit" name="ablaufdatum" /> </td>
		<td> <input type="text" class="fit" name="einkaufdatum" /> </td>
		<td> <input type="text" class="fit" name="hersteller" /> </td>
		<td> <input type="text" class="fit" name="lieferant" /> </td>
		<td> <input type="text" class="fit" name="notiz" /> </td>
		<td> <input type="submit" name="suchen" value="Suchen"> </td>
	</tr>
	<tr>
		<th> Beschreibung </th>
		<th> Haupkomponente </th>
		<th> Ausgelagert </th>
		<th> Komponentenart </th>
		<th> Ablaufdatum </th>
		<th> Einkaufdatum </th>
		<th> Hersteller </th>
		<th> Lieferant </th>
		<th colspan="2"> Notiz </th>
	</tr>

	<?php foreach($view['component'] as $index => $row): ?>
	<tr>
		<td> <?= $row['Beschreibung'] ?> </td>
		<td> <?= $row['Seriennummer'] ?> </td>
		<td>
			<?php if ($row['FK_Raum'] == '0'): ?>
				Ja
			<?php else: ?>
				Nein
			<?php endif; ?>
		</td>
		<td> <?= $row['Komponentenart'] ?> </td>
		<td> <?= $row['Ablaufdatum'] ?> </td>
		<td> <?= $row['Einkaufsdatum'] ?> </td>
		<td> <?= $row['Hersteller'] ?> </td>
		<td> <?= $row['Name'] ?> </td>
		<td colspan="2"> <?= $row['Notiz'] ?> </td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="10" class="centerText">
			<a class="actionButton" href="core/controllers/subcomponents/subcomponentsFormController.php">Neu</a>
		</td>
	</tr>
</table>

<?php require_once($view['rootPath'] . '/views/footer.html'); ?>

</form>
</body>
</html>
