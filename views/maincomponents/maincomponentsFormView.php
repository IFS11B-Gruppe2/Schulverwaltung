<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<table width="100%" border="true">
<tr height="25">
<td>Beschreibung</td><td><input type="text" name="beschreibung"
</tr>
<tr height="25">
<td>Seriennummer</td><td><input type="text" name="seriennummer"
</tr>
<tr height="25">
<td>Ablaufdatum</td><td><input type="date" name="ablaufdatum"
</tr>
<tr height="25">
<td>Komponentenart</td><td><select>
<option disabled selected></option>
<option value="pc">PC</option>
<option value="drucker">Drucker</option>
<option value="beamer">Beamer</option>
</tr>
<tr height="25">
<td>Raum</td><td><select>
<option disabled selected></option>
<option value="r001">R001</option>
<option value="r002">R002</option>
<option value="r003">R003</option>
</tr>
<tr height="25">
<td>Einkaufdatum</td><td><input type="date" name="einkaufdatum"
</tr>
<tr height="25">
<td>Hersteller</td><td><input type="text" name="hersteller"
</tr>
<tr height="25">
<td>Lieferant</td><td><select>
<option disabled selected></option>
<option value="warum">Warum</option>
<option value="nicht">Nicht</option>
</tr>
<tr height="25">
<td>Notiz</td><td><input type="text" name="notiz"
</tr>
<tr>
<td colspan="7" align="right">
<input type="submit" name="save" value="Speichern">
</td>
</tr>
</table>

</body>
</html>