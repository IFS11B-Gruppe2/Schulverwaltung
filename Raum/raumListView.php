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


<table width="100%" border="true">
<tr>
<td width="23%" >Räume </td>
<td width="23%" >Hauptkomponenten </td>
<td width="23%" >Teilkomponenten </td>
<td width="23%" >Stammdaten </td>
<td>Logout </td>


</table>


<table class="data evenRows">
	<tr>
		<th width="120">Raum </th>
		<th width="120">PC Anzahl </th>
		<th width="120">Drucker Anzahl </th>
		<th width="120">Beamer Anzahl </th>
		<th width="120">Stockwerk </th>
		<th width="120">IP Adressbereich</th>
		<th width="120">Notiz </th>
	</tr>


	<?php foreach($view['rooms'] as $index => $row): ?>
	<tr>
		<td width="120"> <?= $row['PK_Raumnr'] ?> </td>
		<td width="120"> <?= $row['pc_anzahl'] ?> </td>
		<td width="120"> <?= $row['drucker_anzahl'] ?> </td>
		<td width="120"> <?= $row['beamer_anzahl'] ?> </td>
		<td width="120"> <?= $row['Stockwerk'] ?> </td>
		<td width="120"> <?= $row['ip_adress'] ?> </td>
		<td width="120"> <?= $row['Notiz'] ?> </td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="7" align="right"><input type="submit" name="neu" value="Neu"></td>
	</tr>
</table>

</body>
</html>
