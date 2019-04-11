<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php
$rechnungsid = $_GET['rechnungsid'];
$teileid = $_GET['teileid'];
$anzahl = $_GET['anzahl'];

$statement = $pdo->prepare("INSERT INTO rechnungsteile (rechnungsid, teileid, anzahl)VALUES(?,?,?)");
$statement->execute(array($rechnungsid, $teileid, $anzahl));

echo "Gespeichert wurde: " . " " . $rechnungsid . " " . $teileid . " " . $anzahl;

header("Refresh:0; url=invoice_new.php?rechnungsid=$rechnungsid");
?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>