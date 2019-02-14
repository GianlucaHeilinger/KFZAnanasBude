<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
$id=$_GET["teileid"];

$sql ="SELECT * FROM teile WHERE teileid = $id";

echo "<table class='table table-striped table-hover ml-2 mr-2>'";

foreach ($pdo->query($sql) as $row) {
    echo "<tr><td>Teile Nr.</td>";
    echo "<td>" . $row['teileid'] . "</td>"; 

    echo "<tr><td>Bezeichnung</td>";
    echo "<td><input type='text' value='" . $row['bezeichnung'] . "'/></td>"; 

    echo "<tr><td>Art</td>";
    if($row['teileart']=="Lohn")
    {
        echo "<td><select name='teileart' size='2'><option selected='selected' value='Lohn'>Lohn</option><option value='Teil'>Teil</option></select></td>";
    }
    else
    {
        echo "<td><select name='teileart' size='2'><option value='Lohn'>Lohn</option><option selected='selected' value='Teil'>Teil</option></select></td>";
    }
    

    echo "<tr><td>Preis</td>";
    echo "<td><input maxlength='11' name='txtPreis' Id='preis' value=".$row['preis']." type='number' step='0.01' /></td>";
} 

echo "<tr><td><label for='submit'></label></td><td><input type='submit' name='Speichern' value='Speichern' class='btn btn-dark'></td></tr>";

echo "</table>";
?>

<?php include('footer.php') ?>