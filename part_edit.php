<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
    $Bezeichnung=$_POST["txtBezeichnung"];
    $Preis=$_POST["txtPreis"];
    $Art=$_POST["teileart"];
    $Id=$_GET["teileid"];
    // $sql = "UPDATE teile SET bezeichnung = ".$Bezeichnung.",teileart=".$Art.", preis=".$Preis." WHERE teile.teileid =". $id;

    $sql = "UPDATE teile SET bezeichnung=?, teileart=?, preis=? WHERE teileid=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$Bezeichnung, $Art, $Preis,$Id]);

    header("Refresh: 0; url=part_list.php");
?>

<?php include('footer.php') ?>