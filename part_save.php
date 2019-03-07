<?php include('header.php') ?>

<?php
include_once('connection.php');

$Bezeichnung=$_POST["txtBezeichnung"];
$Preis=$_POST["txtPreis"];
$Art=$_POST["teileart"];

// echo $Bezeichnung;
$sql = "INSERT INTO teile (teileid, bezeichnung,teileart, preis) VALUES (?,?,?,?)";
$statement= $pdo->prepare($sql);
$statement->execute([Null,$Bezeichnung,$Art,$Preis]);

header("Refresh: 0; url=part_list.php");
?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>