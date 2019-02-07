<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ANANAS KFZ-BUDE</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    
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

    echo $Bezeichnung;
    $sql = "INSERT INTO teile (teileid, bezeichnung, preis) VALUES (?,?,?)";
    $statement= $pdo->prepare($sql);
    $statement->execute([Null,$Bezeichnung,$Preis]);

header("Refresh: 1; url=part_list.php");
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>