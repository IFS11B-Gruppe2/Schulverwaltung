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
