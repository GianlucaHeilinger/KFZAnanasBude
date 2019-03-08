<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php
$rechnungsnummer = $_GET['rechnungsnummer'];
header("Refresh: 2; url=invoice.php");

$rechnungsdatum = $_GET['rechnungsdatum'];
$status = $_GET['status'];
$preis = $_GET['preis'];


$statement = $pdo->prepare("UPDATE rechnung SET rechnungsdatum=?, status=? WHERE rechnungsnummer=?");
$statement->execute(array($rechnungsdatum, $status, $rechnungsnummer));

$statement = $pdo->prepare("UPDATE rechnungdetails SET preis=? WHERE rechnungsnummer=?");
$statement->execute(array($preis, $rechnungsnummer));

echo "Gespeichert wurde: " . $rechnungsnummer . " " . $rechnungsdatum . " " . $status . " " . $preis;
?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>