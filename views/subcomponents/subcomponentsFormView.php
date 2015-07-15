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
<td>Beschreibung</td>
<td><input type="text" name="beschreibung"></td>
</tr>
<tr height="25">
<td>Hauptkomponente</td><td>
<select name="komponente">
<option disabled selected></option>
<option value="1">PC01</option>
<option value="2">PC02</option>
<option value="3">PC03</option>
<option value="4">PC04</option>
<option value="5">PC05</option>
<option value="6">PC06</option>
</select>
</td></tr>
<tr height="25">
<td>Gewaehrleistungsdauer</td><td><input type="int" name="gewaehrleistungsdauer"
</tr>
<tr height="25">
<td>Ausgelagert</td><td><input type="text" name="ausgelagert"
</tr>
<tr height="25">
<td>Komponentenart</td><td>
<select name="art">
<option disabled selected></option>
<option value="2">RAM</option>
<option value="3">CPU</option>
<option value="4">Mainboard</option>
<option value="5">Festplatte</option>
<option value="6">Grafikkarte</option>
<option value="7">Netzwerkkarte</option>
<option value="8">Raidcontroller</option>
<option value="9">CD-ROM</option>
<option value="10">CD-Brenner</option>
<option value="11">DVD-ROM</option>
<option value="12">DVD-Brenner</option>
<option value="13">Netzteil</option>
<option value="14">Switch</option>
<option value="15">VLAN</option>
<option value="16">Router</option>
<option value="17">Hub</option>
<option value="18">Accesspoint</option>
<option value="20">Software</option>
</select>
</td></tr>
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
</td></tr>
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