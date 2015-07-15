<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="" method="POST">
<table width="100%" border="true">
<tr height="25">
<td>Benutzer</td><td><input type="text" name="benutzer"
</tr>
<tr height="25">
<td>Benutzergruppe</td><td>
<select name="group">
<option value ="mitarbeiter">Mitarbeiter</option>
<option value="administrator">Administrator</option>
</select>
</tr>
<tr height="25">
<td>Passwort</td><td><input type="password" name="passwort"></td>
</tr>
<tr>
<td colspan="7" align="right">
<input type="submit" name="save" value="Speichern">
</td>
</tr>
</table>
</form>

</body>
</html>