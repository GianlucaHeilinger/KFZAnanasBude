<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php
$repid = $_POST['repid'];

// query um kundennummer eines auftrages zu bekommen
$sqlforkundennummer = "SELECT
kunde.kundennummer AS kundennummer
FROM kunde
LEFT JOIN fahrzeug
ON kunde.kundennummer = fahrzeug.kundeid
LEFT JOIN reparatur
ON fahrzeug.fzid = reparatur.fzid
WHERE
reparatur.repid = $repid
";

$stmtforkundennummer = $pdo->prepare($sqlforkundennummer);
$stmtforkundennummer->execute();
$resultforkundennummer = $stmtforkundennummer->fetch();
// ende query

// query um fzid eines auftrages zu bekommen
$sqlforfzid = "SELECT
fzid AS fzid
FROM reparatur
WHERE
repid = $repid
";

$stmtforfzid = $pdo->prepare($sqlforfzid);
$stmtforfzid->execute();
$resultforfzid = $stmtforfzid->fetch();
// ende query

// query für summe
$sqlforsumme = "SELECT
reparaturteile.anzahl,
teile.preis
from reparaturteile
LEFT JOIN teile
ON reparaturteile.teileid = teile.teileid
WHERE repid = $repid
";

$summe = 0;
foreach ($pdo->query($sqlforsumme) as $row) {
    $rowsum = $row['anzahl'] * $row['preis'];
    $summe = $summe + $rowsum;
};
// ende query

$rechnungsnummer = $_POST['rechnungsnummer'];
$rechnungsdatum = date("Y-m-d");

$kundennummer = $resultforkundennummer['kundennummer'];
$fzid = $resultforfzid['fzid'];
$status = 'offen';

$statement = $pdo->prepare("INSERT INTO rechnung (repid, rechnungsnummer, rechnungsdatum, kundenid, fahrzeugid, `summe`, `status`)VALUES(?,?,?,?,?,?,?)");
$statement->execute(array($repid, $rechnungsnummer, $rechnungsdatum, $kundennummer, $fzid, $summe, $status));


echo 'repid '.$repid;
echo '<br />';
echo 'rechnungsnummer '.$rechnungsnummer;
echo '<br />';
echo 'rechnungsdatum '.$rechnungsdatum;
echo '<br />';
echo 'kundennummer '.$kundennummer;
echo '<br />';
echo 'fzid '.$fzid;
echo '<br />';
echo 'status '.$status;
echo '<br />';
echo 'result kdnr '.$resultforkundennummer['kundennummer'];
echo '<br />';
echo 'summe '.$summe;
echo '<br />';
echo 'result fzid '.$resultforfzid['fzid'];
echo '<br />';

$rechnungerstellt = 1;
$statement2 = $pdo->prepare("UPDATE reparatur SET rechnungerstellt = ? WHERE repid = ?");
$statement2->execute(array($rechnungerstellt, $repid));

echo 'rechnungerstellt '.$rechnungerstellt;
echo '<br />';

header("Refresh: 3; url=invoice.php");
?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>