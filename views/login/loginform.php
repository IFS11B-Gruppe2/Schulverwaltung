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



<form action="" method="POST">
	<table class="form">
		<tr>
			<td> Benutzername </td>
			<td> <input type="text" name="benutzer" /> </td>
		</tr>
		<tr>
			<td> Passwort </td>
			<td> <input type="password" name="passwort" /> </td>
		</tr>

		<tr>
			<td colspan="2" class="centerText">
				<input type="submit" class="actionButton" name="login" value="Login" />
			</td>
		</tr>
	</table>
</form>

</body>
</html>
