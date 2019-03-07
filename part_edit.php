<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
$id=$_GET["teileid"];

$sql ="SELECT * FROM teile WHERE teileid = $id";

echo "<form form action='' method='post'>";

echo "<a href='part_delete.php?teileid=".$id."'><i class='far fa-trash-alt'></i></a>";

echo "<table class='table table-striped table-hover ml-2 mr-2>'";

foreach ($pdo->query($sql) as $row) {
    echo "<tr><td>Teile Nr.</td>";
    echo "<td><p name='txtid'" . $row['teileid'] . "/></td>"; 

    echo "<tr><td>Bezeichnung</td>";
    echo "<td><input name='txtBezeichnung' type='text' value='" . $row['bezeichnung'] . "'/></td>"; 

    echo "<tr><td>Art</td>";
    if($row['teileart']=="Lohn")
    {
        echo "<td><select name='teileart' size='1'><option selected='selected' value='Lohn'>Lohn</option><option value='Teil'>Teil</option></select></td>";
    }
    else
    {
        echo "<td><select name='teileart' size='1'><option value='Lohn'>Lohn</option><option selected='selected' value='Teil'>Teil</option></select></td>";
    }
    

    echo "<tr><td>Preis</td>";
    echo "<td><input name='txtPreis' maxlength='11' name='txtPreis' Id='preis' min=0 value=".$row['preis']." type='number' step='0.01' /></td>";

    break;
} 

echo "<tr><td></td><td><input type='submit' name='Speichern' value='Speichern' class='btn btn-dark'></td></tr>";

echo "</table>";
echo "</form>";

if(isset($_POST['Speichern']))
{
    $Bezeichnung=$_POST["txtBezeichnung"];
    $Preis=$_POST["txtPreis"];
    $Art=$_POST["teileart"];

   // $sql = "UPDATE teile SET bezeichnung = ".$Bezeichnung.",teileart=".$Art.", preis=".$Preis." WHERE teile.teileid =". $id;

    $sql = "UPDATE teile SET bezeichnung=?, teileart=?, preis=? WHERE teileid=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$Bezeichnung, $Art, $Preis,$id]);

    header("Refresh: 0; url=part_list.php");
}
?>

<?php include('footer.php') ?>