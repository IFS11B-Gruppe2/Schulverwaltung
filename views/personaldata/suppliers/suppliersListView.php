<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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



<table width="100%" border="true">

<tr>
<td width="120"> <input type="text" name="lieferant"> </td>
<td width="140"> <input type="text" name="anschrift" > </td>
<td width="100"> <input type="text" name="ort" > </td>
<td width="70"> <input type="text" name="plz" > </td>
<td width="120"> <input type="text" name="email" > </td>
<td width="120"> <input type="text" name="telefon" > </td>
<td> <input type="text" name="notiz"></td>
<td> <input type="submit" name="suchen" value="Suchen"></td>
</tr>
<tr>
<td width="120">Lieferant </td>
<td width="140">Anschrift </td>
<td width="100">Ort </td>
<td width="70">PLZ </td>
<td width="120">E-mail </td>
<td width="120">Telefon </td>
<td> Notiz </td>
</tr>

<?php foreach($view['supplier'] as $index => $row): ?>
<tr>
	<td width="120"> <?= $row['Name'] ?> </td>
	<td width="120"> <?= $row['Strasse'] .' '. $row['Hausnr'] ?> </td>
	<td width="120"> <?= $row['Ort'] ?> </td>
	<td width="120"> <?= $row['PLZ'] ?> </td>
	<td width="120"> <?= $row['Email'] ?> </td>
	<td width="120"> <?= $row['Telefon'] ?> </td>
	<td width="120"> <?= $row['Notiz'] ?> </td>
</tr>
<?php endforeach; ?>


<tr>

<td colspan="8" align="right"><input type="submit" name="neu" value="Neu"></td>
</tr>

</table>
	
</body>
</html>