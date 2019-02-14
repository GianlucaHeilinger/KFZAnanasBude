<?php include_once('connection.php'); ?>
<?php include('header.php'); ?>

<?php
$kundeName = '';
$kn = '';
$FzName = '';



if (count($_POST)) {
	//print_r($_POST);
	if ($_POST['todo'] == 'reset') {
		echo '<meta http-equiv="refresh" content="0;">';
	}
	if ($_POST['todo'] == 'kdsetzen') {
		
		$kundeName .= '<option>'.$_POST['kd'].'</option>';	

		$id = substr($_POST['kd'], -1);

		
		// ----- jew KD-Fahrzeuge ebfragen -----
		include_once('connection.php');

		$sql='SELECT * FROM fahrzeug WHERE kundeid = '.$id.'';
		foreach($pdo->query($sql) as $row) {
			$FzName .= '<option>'.$row['marke'].'</option>';	
		}
		
	}
}
else {
	//print_r($_POST);
	
	// ----- DB abfragen / KUNDE -----
	include_once('connection.php');

	$sql='SELECT * FROM kunde';
	foreach($pdo->query($sql) as $row) {
		$kundeName .= '<option>'.$row['nachname'].' '.$row['vorname'].' '.$row['kundennummer'].'</option>';	
	}
}








?>

<!-- <body> from header.php -->
    

<table class="table table-striped table-hover ml-2 mr-2">
<thead class="thead-dark">
    <tr>
        <th scope='col'>Neue Reparatur</th>
					<form form action="" method="post" id="welcherkunde" name="welcherkunde">
				<!-- <input type="hidden" id="todo" name="todo" value="reset" >
				<input type="submit" class="btn btn-dark" value="reset"> -->
			</form>
        <th scope='col'>&nbsp;</th>
    </tr>
</thead>
<tbody>
<form action="" method="post" id="welcherkunde" name="welcherkunde">
	<input type="hidden" id="todo" name="todo" value="kdsetzen" >
    <tr>
		<td>Kunde</td>
		<td>
			<select onchange=this.form.submit() name="kd" id="kd">
				<?php echo $kundeName; ?>
			</select>
			<!-- <input type="submit" class="btn btn-dark" value="setzen">  -->
		</td>
    </tr>
</form>
<form form action="" method="post" id="kdform">
    <tr>
		<td>KFZ</td>
		<td>
			<select name="FzName" id="FzName">
				<?php echo $FzName; ?>
			</select>
		</td>
    </tr>
    <tr>
        <td>Datum</td>
        <td><input name='ReparaturDatum' id='ReparaturDatum' type='date'/></td>
    </tr>   
    <tr>
        <td>Ersatzteil</td>
        <td><input name='Ersatzteil' Id='Ersatzteil' type='text' value=''/></td>
    </tr> 
    <tr>
        <td>Anzahl</td>
        <td><input name='Ersatzteil' Id='Ersatzteil' type='number' value=''/></td>
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