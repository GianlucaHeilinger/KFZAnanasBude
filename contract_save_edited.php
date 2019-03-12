<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php
$repid = $_GET['repid'];
$teileid = $_GET['teileid'];
$anzahl = $_GET['anzahl'];

$statement = $pdo->prepare("INSERT INTO reparaturteile (repid, teileid, anzahl)VALUES(?,?,?)");
$statement->execute(array($repid, $teileid, $anzahl));

echo "Gespeichert wurde: " . " " . $repid . " " . $teileid . " " . $anzahl;

header("Refresh: 0; url=contract_detail.php?repid={$repid}");
?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>