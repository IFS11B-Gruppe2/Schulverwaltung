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
		<td> <input type="text" name="bescheibung"> </td>
		<td> <input type="text" name="hauptkomponente"> </td>
		<td> <input type="text" name="ausgelagert"> </td>
		<td> <input type="text" name="komponentenart"> </td>
		<td> <input type="text" name="ablaufdatum"> </td>
		<td> <input type="text" name="einkaufdatum"> </td>
		<td> <input type="text" name="hersteller"> </td>
		<td> <input type="text" name="lieferant"> </td>
		<td> <input type="text" name="notiz"> </td>
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
		<th> Notiz </th>
	</tr>

	<?php foreach($view['component'] as $index => $row): ?>
	<tr>
		<td> <?= $row['Beschreibung'] ?> </td>
		<td> <?= $row['Beschreibung'] ?> </td>
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
		<td> <?= $row['Notiz'] ?> </td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="11" align="right">
			<input type="submit" name="neu" value="Neu">
		</td>
	</tr>
</table>

</body>
</html>
