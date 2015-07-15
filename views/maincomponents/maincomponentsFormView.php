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
<td>Beschreibung</td><td><input type="text" name="beschreibung"
</tr>

<tr height="25">
<td>Seriennummer</td><td><input type="text" name="seriennummer"
</tr>
<tr height="25">
<td>Gewaehrleistungsdauer</td><td><input type="int" name="gewaehrleistungsdauer"
</tr>
<tr height="25">
<td>Komponentenart</td><td>
<select name="art">
<option disabled selected></option>
<option value="1">PC</option>
<option value="19">Drucker</option>
</select>
</tr>
<tr height="25">
<td>Raum</td><td>
<select name="raum">
<option disabled selected></option>
<option value="0">Ausgemustert</option>
<option value="1">R001</option>
<option value="2">R002</option>
<option value="112">R112</option>
<option value="116">R116</option>
<option value="301">R301</option>
</select>
</tr>
<tr height="25">
<td>Einkaufdatum</td><td><input type="date" name="einkaufdatum"
</tr>
<tr height="25">
<td>Hersteller</td><td><input type="text" name="hersteller"
</tr>
<tr height="25">
<td>Lieferant</td><td>
<select name="lieferant">
<option disabled selected></option>
<option value="1">Sinell EDV Zubehoer GmbH</option>
<option value="2">Ingram Micro Distrubution GmbH</option>
<option value="3">proMX GmbH</option>
</select>
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
</form>
</body>
</html>