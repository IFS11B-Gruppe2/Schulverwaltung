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
		<td> <input type="text" name="lieferant"> </td>
		<td> <input type="text" name="anschrift" > </td>
		<td> <input type="text" name="ort"> </td>
		<td> <input type="text" name="plz"> </td>
		<td> <input type="text" name="email"> </td>
		<td> <input type="text" name="telefon"> </td>
		<td> <input type="text" name="notiz"> </td>
		<td> <input type="submit" name="suchen" value="Suchen"> </td>
	</tr>

	<tr>
		<th> Lieferant </th>
		<th> Anschrift </th>
		<th> Ort </th>
		<th> PLZ </th>
		<th> E-mail </th>
		<th> Telefon </th>
		<th> Notiz </th>
	</tr>

	<?php foreach($view['supplier'] as $index => $row): ?>
	<tr>
		<td> <?= $row['Name'] ?> </td>
		<td> <?= $row['Strasse'] .' '. $row['Hausnr'] ?> </td>
		<td> <?= $row['Ort'] ?> </td>
		<td> <?= $row['PLZ'] ?> </td>
		<td> <?= $row['Email'] ?> </td>
		<td> <?= $row['Telefon'] ?> </td>
		<td> <?= $row['Notiz'] ?> </td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="8" align="right">
			<a href="core/controllers/personaldata/suppliers/suppliersFormController.php">Neu</a>
		</td>
	</tr>
</table>

</body>
</html>
