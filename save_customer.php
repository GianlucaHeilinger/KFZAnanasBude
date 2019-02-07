<?php include('base.php') ?>
<?php

header("Refresh: 3; url=new_car.php");

$anrede = $_GET['anrede'];
$titel = $_GET['titel'];
$vorname = $_GET['vorname'];
$nachname = $_GET['nachname'];
$gebdat = $_GET['gebdat'];
$strasse = $_GET['strasse'];
$plz = $_GET['plz'];
$ort = $_GET['ort'];
$telefon = $_GET['telefon'];
$email = $_GET['email'];
$newsletter = $_GET['newsletter'];
$kommentar = $_GET['kommentar'];
$kundeseit = $_GET['kundeseit'];


$statement = $pdo->prepare("INSERT INTO kunde (anrede, titel, vorname, nachname, gebdat, strasse, plz, ort, telefon, email, newsletter, kommentar, kundeseit)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
$statement->execute(array($anrede, $titel, $vorname, $nachname, $gebdat, $strasse, $plz, $ort, $telefon, $email, $newsletter, $kommentar, $kundeseit));

echo "Gespeichert wurde: " . " " . $anrede . " " . $titel . " " . $vorname .  " " . $nachname .  " " . $gebdat .  " " . $strasse .  " " . $plz . " " . $ort . " " . $telefon . " " . $email . " " . $newsletter . " " . $kommentar . " " . $kundeseit;
?>