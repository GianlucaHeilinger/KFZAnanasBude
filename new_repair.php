<?php include('connection.php'); ?>
<?php include('header.php'); ?>

<?php
$kundeName = '';
$kn = '';
// ----- DB abfragen / KUNDE -----
include('connection.php');
$sql='SELECT * FROM kunde';
foreach($pdo->query($sql) as $row) {
	$kundeName .= '<option value="'.$row['kundennummer'].'">'.$row['nachname'].' '.$row['vorname'].' '.$row['kundennummer'].'</option>';
	$kn = $row['kundennummer'];
}
// ----- DB abfragen / KFZ zum jew. KD -----
include('connection.php');
$sql='SELECT * FROM fahrzeug';




?>

<!-- <body> from header.php -->
    
<form form action="" method="post">
<table class="table table-striped table-hover ml-2 mr-2">
<thead class="thead-dark">
    <tr>
        <th scope='col'>Neue Reparatur</th>
        <th scope='col'>&nbsp;</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>Neue Reparatur</td>
        <td><input maxlength='11' name='txtPreis' Id='preis' type='number' value=''/></td>
    </tr> 
    <tr>
		<td>Kunde</td>
		<td>
			<select>
				<?php echo $kundeName; ?>
			</select>
		</td>	
    </tr>	
    <tr>
		<td>KFZ</td>
		<td>
			<select>
				<option value="volvo">Volvo</option>
				<option value="saab">Saab</option>
				<option value="opel">Opel</option>
				<option value="audi">Audi</option>
			</select>
		</td>	
    </tr>
    <tr>
        <td>Detail</td>
        <td><input maxlength='11' name='detail' Id='detail' type='number' value=''/></td>
    </tr>   	
    <tr>
    <td>
        <label for="submit"></label>
    </td>
    <td>
        <input type="submit" name="Speichern" value="Speichern" class="btn btn-dark">
    </td>
</tr>
</tbody>
</table>


</form>


<?php
include('connection.php');

if(isset($_POST['Speichern']))
{
    $Bezeichnung=$_POST["txtBezeichnung"];
    $Preis=$_POST["txtPreis"];

    // echo $Bezeichnung;
    $sql = "INSERT INTO teile (teileid, bezeichnung, preis) VALUES (?,?,?)";
    $statement= $pdo->prepare($sql);
    $statement->execute([Null,$Bezeichnung,$Preis]);

header("Refresh: 0; url=part_list.php");
}
?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>