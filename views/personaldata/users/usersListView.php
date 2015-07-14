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
		<th> Benutzer </th>
		<th> Benutzergruppe </th>
	</tr>

	<?php foreach($view['user'] as $index => $row): ?>
	<tr>
		<td> <?= $row['Name'] ?> </td>
		<td> <?= $row['Gruppe'] ?> </td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="2" align="right">
			<input type="submit" name="neu" value="Neu">
		</td>
	</tr>
</table>

</body>
</html>
