<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
    
<form form action="" method="post">
<table class="table table-striped table-hover ml-2 mr-2">
<thead class="thead-dark">
    <tr>
        <th scope='col'>Neues Teil</th>
        <th scope='col'>&nbsp;</th>
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