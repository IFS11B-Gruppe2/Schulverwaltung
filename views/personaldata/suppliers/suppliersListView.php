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
		<td> 
		<a href="core/controllers/personaldata/suppliers/suppliersFormController.php?Lieferant=<?= $row['Name'] ?>">
				<?= $row['Name'] ?> 
			</a>
		</td>
		<td> <?= $row['Strasse'] . ' ' . $row['Hausnr'] ?> </td>
		<td> <?= $row['Ort'] ?> </td>
		<td> <?= $row['PLZ'] ?> </td>
		<td> <?= $row['Email'] ?> </td>
		<td> <?= $row['Telefon'] ?> </td>
		<td> <?= $row['Notiz'] ?> </td>
	</tr>
	<?php endforeach; ?>

	<tr>
		<td colspan="7" class="centerText">
			<a class="actionButton" href="core/controllers/personaldata/suppliers/suppliersFormController.php">Neu</a>
		</td>
	</tr>
</table>

</body>
</html>
