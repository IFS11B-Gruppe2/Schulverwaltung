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
<td> <input type="text" name="bescheibung"> </td>
<td> <input type="text" name="seriennummer" > </td>
<td> <input type="text" name="ablaufdatum" > </td>
<td> <input type="text" name="komponentenart" > </td>
<td> <input type="text" name="raum" > </td>
<td> <input type="text" name="einkaufdatum" > </td>
<td> <input type="text" name="hersteller" > </td>
<td> <input type="text" name="lieferant" > </td>
<td> <input type="text" name="notiz"> </td>
<td> <input type="submit" name="suchen" value="Suchen"> </td>
</tr>
<tr>
<td>Beschreibung </td>
<td>Seriennummer </td>
<td>Ablaufdatum </td>
<td>Komponentenart </td>
<td>Raum </td>
<td>Einkaufdatum </td>
<td>Hersteller </td>
<td>Lieferant </td>
<td> Notiz </td>
</tr>



<?php foreach($view['maincomponent'] as $index => $row): ?>
<tr>
	<td width="120"> <?= $row['Beschreibung'] ?> </td>
	<td width="120"> <?= $row['Seriennummer'] ?> </td>
	<td width="120"> <?= $row['Ablaufdatum'] ?> </td>
	<td width="120"> <?= $row['FK_Komponentenart'] ?> </td>
	<td width="120"> <?= $row['FK_Raum'] ?> </td>
	<td width="120"> <?= $row['Einkaufsdatum'] ?> </td>
	<td width="120"> <?= $row['Hersteller'] ?> </td>
	<td width="120"> <?= $row['FK_Lieferant'] ?> </td>
	<td width="120"> <?= $row['Notiz'] ?> </td>
</tr>
<?php endforeach; ?>


<tr>

<td colspan="11" align="right"><input type="submit" name="neu" value="Neu"></td>
</tr>

</table>
	
</body>
</html>