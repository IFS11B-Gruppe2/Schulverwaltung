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

<table class="data evenRows">
	<tr>
		<th> Raum </th>
		<th> PC Anzahl </th>
		<th> Drucker Anzahl </th>
		<th> Beamer Anzahl </th>
		<th> Stockwerk </th>
		<th> IP Adressbereich </th>
		<th> Notiz </th>
	</tr>

	<?php foreach($view['rooms'] as $index => $row): ?>
	<tr>
		<td> <?= str_pad($row['PK_Raumnr'], 3, "0", STR_PAD_LEFT) ?> </td>
		<td> <?= $row['pc_anzahl'] ?> </td>
		<td> <?= $row['drucker_anzahl'] ?> </td>
		<td> <?= $row['beamer_anzahl'] ?> </td>
		<td> <?= $row['Stockwerk'] ?> </td>
		<td> <?= $row['ip_adress'] ?> </td>
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
