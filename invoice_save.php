<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php

$repid = $_POST['repid'];
$rechnungsnummer = $_POST['rechnungsnummer'];

$sql ="SELECT 
reparatur.repid,
reparatur.fzid,
reparatur.datum,
reparaturteile.reparaturteileid,
reparaturteile.teileid,
reparaturteile.anzahl,
teile.bezeichnung,
teile.teileart,
teile.preis
FROM reparatur
LEFT JOIN reparaturteile
ON reparatur.repid = reparaturteile.repid
LEFT JOIN teile
ON reparaturteile.teileid = teile.teileid
WHERE
repid = $repid";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();

while($row2 = $result2->fetch())
    {
        $kundenid = $row2['kundeid'];
        $marke = $row2['marke'];
        $type = $row2['type'];
        $kennzeichen = $row2['kennzeichen'];
    }


// SUM(teile.preis) AS summe





$rechnungsnummer = $_GET['rechnungsnummer']; // rechnung + rechnungdetails
$rechnungsdatum = $_GET['rechnungsdatum'];   // rechnung
$kundenid = $_GET['kundenid'];               // rechnung
$fahrzeugid = $_GET['fahrzeugid'];           // rechnung
$status = $_GET['status'];                   // rechnung
$teileid = $_GET['teileid'];                 // rechnungdetails
$anzahl = $_GET['anzahl'];                   // rechnungdetails
$preis = $_GET['preis'];                     // rechnungdetails

$statement = $pdo->prepare("INSERT INTO rechnung (rechnungsnummer, rechnungsdatum, kundenid, fahrzeugid, status)VALUES(?,?,?,?,?)");
$statement->execute(array($rechnungsnummer, $rechnungsdatum, $kundenid, $fahrzeugid, $status));

$statement = $pdo->prepare("INSERT INTO rechnungdetails (rechnungsnummer, teileid, anzahl, preis)VALUES(?,?,?,?)");
$statement->execute(array($rechnungsnummer, $teileid, $anzahl, $preis));


echo "Gespeichert wurde: " . $rechnungsnummer . " " . $rechnungsdatum . " " . $kundenid . " " . $fahrzeugid . " " . $status . " " . $teileid . " " . $anzahl . " " . $preis;

header("Refresh: 2; url=invoice.php");
?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>