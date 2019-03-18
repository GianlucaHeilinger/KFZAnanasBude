<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php
$rechnungsnummer = $_GET['rechnungsnummer'];

$rechnungsdatum = $_GET['rechnungsdatum'];
$status = $_GET['status'];
$preis = $_GET['preis'];

$statement = $pdo->prepare("UPDATE rechnung SET rechnungsdatum=?, `status`=?, summe=? WHERE rechnungsnummer=?");
$statement->execute(array($rechnungsdatum, $status, $preis, $rechnungsnummer));

header("Refresh: 0; url=invoice.php");
?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>