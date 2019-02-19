<?php include_once('connection.php') ?>
<?php

$kundennummer = $_GET['kundennummer'];
$url = "customer_detail.php?kundennummer={$kundennummer}";
header("Refresh: 1; url={$url}");

$kundeid = $_GET['kundennummer'];
$marke = $_GET['marke'];
$type = $_GET['type'];
$kennzeichen = $_GET['kennzeichen'];
$fahrgestellnummer = $_GET['fahrgestellnummer'];
$nationalcode = $_GET['nationalcode'];
$motorkennzeichen = $_GET['motorkennzeichen'];
$getriebekennzeichen = $_GET['getriebekennzeichen'];
$farbe = $_GET['farbe'];
$treibstoff = $_GET['treibstoff'];
$leistung = $_GET['leistung'];
$hubraum = $_GET['hubraum'];
$erstzulassung = $_GET['erstzulassung'];


$statement = $pdo->prepare("INSERT INTO fahrzeug (kundeid, marke, `type`, kennzeichen, fahrgestellnummer, nationalcode, motorkennzeichen, getriebekennzeichen, farbe, treibstoff, leistung, hubraum, erstzulassung)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
$statement->execute(array($kundeid, $marke, $type, $kennzeichen, $fahrgestellnummer, $nationalcode, $motorkennzeichen, $getriebekennzeichen, $farbe, $treibstoff, $leistung, $hubraum, $erstzulassung));

echo "Gespeichert wurde: " . " " . $kundeid . " " . $marke . " " . $type .  " " . $kennzeichen .  " " . $fahrgestellnummer .  " " . $nationalcode .  " " . $motorkennzeichen . " " . $getriebekennzeichen . " " . $farbe . " " . $treibstoff . " " . $leistung . " " . $hubraum . " " . $erstzulassung;
?>