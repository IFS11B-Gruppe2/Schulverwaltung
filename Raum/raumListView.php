<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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


<table width="100%" border="true">

<tr>
<td width="120">Raum </td>
<td width="120">PC Anzahl </td>
<td width="120">Drucker Anzahl </td>
<td width="120">Beamer Anzahl </td>
<td width="120">Stockwerk </td>
<td width="120">IP Adressbereich</td>
<td width="120">Notiz </td>
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