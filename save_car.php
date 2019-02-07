<?php include('base.php') ?>
<?php

header("Refresh: 3; url=index.php");

$kunde = $_GET['kunde'];
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


$statement = $pdo->prepare("INSERT INTO fahrzeug (kunde, marke, 'type', kennzeichen, fahrgestellnummer, nationalcode, motorkennzeichen, getriebekennzeichen, farbe, treibstoff, leistung, hubraum, erstzulassung)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
$statement->execute(array($kunde, $marke, $type, $kennzeichen, $fahrgestellnummer, $nationalcode, $motorkennzeichen, $getriebekennzeichen, $farbe, $treibstoff, $leistung, $hubraum, $erstzulassung));

echo "Gespeichert wurde: " . " " . $kunde . " " . $marke . " " . $type .  " " . $kennzeichen .  " " . $fahrgestellnummer .  " " . $nationalcode .  " " . $motorkennzeichen . " " . $getriebekennzeichen . " " . $farbe . " " . $treibstoff . " " . $leistung . " " . $hubraum . " " . $erstzulassung;
?>