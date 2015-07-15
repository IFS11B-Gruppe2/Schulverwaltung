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
		<th> Raum </th>
		<th> PC Anzahl </th>
		<th> Drucker Anzahl </th>
		<th> Stockwerk </th>
		<th> IP Adressbereich </th>
		<th> Notiz </th>
	</tr>

	<?php foreach($view['rooms'] as $index => $row): ?>
	<tr>
		<td>
			<a href="/">
				<?= 'R' . str_pad($row['PK_Raumnr'], 3, "0", STR_PAD_LEFT) ?>
			</a>
		</td>
		<td> <?= $row['total_pc'] ?> </td>
		<td> <?= $row['total_printers'] ?> </td>
		<td> <?= ($row['Stockwerk'] > 0) ? $row['Stockwerk'] . '.O.G.' : 'E.G.' ?> </td>
		<td> <?= $row['IP_AdressbereichAnfang'] . ' - ' . $row['IP_AdressbereichEnde'] ?> </td>
		<td> <?= $row['Notiz'] ?> </td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="7" align="right">
			<input type="submit" name="neu" value="Neu">
		</td>
	</tr>
</table>

</body>
</html>
