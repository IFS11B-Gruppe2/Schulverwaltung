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
<td width="50%">Benutzer </td>
<td width="50%">Benutzergruppe </td>
</tr>

<?php foreach($view['user'] as $index => $row): ?>
<tr>
	<td width="120"> <?= $row['Name'] ?> </td>
	<td width="120"> <?= $row['Gruppe'] ?> </td>
</tr>
<?php endforeach; ?>

<tr>

<td colspan="7" align="right"><input type="submit" name="neu" value="Neu"></td>
</tr>

</table>
	
</body>
</html>