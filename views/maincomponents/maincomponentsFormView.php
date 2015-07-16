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

<form action="" method="POST">
	<table class="form">
		<tr>
			<td> Beschreibung </td>
			<td> <input type="text" name="txtDescription" value="<?= $view['form']['txtDescription'] ?>" /> </td>
		</tr>

		<tr>
			<td> Seriennummer </td>
			<td> <input type="text" name="txtSerialNumber" value="<?= $view['form']['txtSerialNumber'] ?>" /> </td>
		</tr>

		<tr>
			<td> Gewaehrleistungsdauer </td>
			<td> <input type="number" name="txtWarrantyYears" value="<?= $view['form']['txtWarrantyYears'] ?>" /> </td>
		</tr>

		<tr>
			<td> Komponentenart </td>
			<td>
				<select name="cmbComponentType">
					<?php foreach ($view['maincomponentTypes'] as $index => $row): ?>
						<?php
							if ($view['form']['cmbComponentType'] == $row['PK_ID']):
								$selected = 'selected';
							else:
								$selected = '';
							endif;
						?>
						<option value="<?= $row['PK_ID'] ?>" <?= $selected ?>> <?= $row['Bezeichnung'] ?> </option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>

		<tr>
			<td> Raum </td>
			<td>
				<select name="cmbRoomNumber">
					<option>Raum wählen</option>
					<?php foreach ($view['rooms'] as $index => $row): ?>
						<?php
							if ($view['form']['cmbRoomNumber'] == $row['PK_Raumnr']):
								$selected = 'selected';
							else:
								$selected = '';
							endif;
						?>
						<option value="<?= $row['PK_Raumnr'] ?>" <?= $selected ?>>
							<?= 'R' . str_pad($row['PK_Raumnr'], 3, '0', STR_PAD_LEFT) ?>
						</option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>

		<tr>
			<td> Einkaufdatum </td>
			<td> <input type="date" name="txtBuyDate" value="<?= $view['form']['txtBuyDate'] ?>" /> </td>
		</tr>

		<tr>
			<td> Hersteller </td>
			<td> <input type="text" name="txtManufacturer" value="<?= $view['form']['txtManufacturer'] ?>" /> </td>
		</tr>

		<tr>
			<td> Lieferant </td>
			<td>
				<select name="cmbSupplierID">
					<?php foreach ($view['suppliers'] as $index => $row): ?>
						<?php
							if ($view['form']['cmbSupplierID'] == $row['PK_ID']):
								$selected = 'selected';
							else:
								$selected = '';
							endif;
						?>
						<option value="<?= $row['PK_ID'] ?>" <?= $selected ?>>
							<?= $row['Name'] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>

		<tr>
			<td> Notiz </td>
			<td> <input type="text" name="txtNote" value="<?= $view['form']['txtNote'] ?>" /> </td>
		</tr>

		<tr>
			<td colspan="2" class="centerText">
				<input type="submit" class="actionButton" name="btnSave" value="Speichern">
			</td>

			<td colspan="2" class="centerText">
				<a class="actionButton" href="core/controllers/maincomponents/maincomponentsListController.php">Zur&uuml;ck</a>
			</td>
		</tr>
	</table>
</form>

</body>
</html>
