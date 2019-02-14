<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
    
<form form action="" method="post">
<table>
<thead>
    <tr>
        <td scope='col'>Neues Teil</td>
        <td scope='col'>&nbsp;</td>
    </tr>
</thead>
<tbody>  
    <tr>
        <td>Bezeichnung</td>
        <td><input name='txtBezeichnung' type='text' Id='bezeichnung' value=''/></td>
    </tr>
    <tr>
        <td>Preis</td>
        <td><input maxlength='11' name='txtPreis' Id='preis' type='number' value=''/></td>
    </tr>   
</tbody>
</table>

<input value='Speichern' Name="Speichern" type="submit"/>
</form>


<?php
include('base.php');

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