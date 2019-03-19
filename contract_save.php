<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php
$fzid = $_GET['fzid'];
$datum = $_GET['date'];
$rechnungerstellt = 0;

$statement = $pdo->prepare("INSERT INTO reparatur (fzid, datum, rechnungerstellt)VALUES(?,?,?)");
$statement->execute(array($fzid, $datum, $rechnungerstellt));

echo "Gespeichert wurde: " . " " . $fzid . " " . $datum. " " . $rechnungerstellt;

$repid = $pdo->lastInsertId();
$url = "contract_detail.php?repid={$repid}";
header("Refresh: 3; url={$url}");

?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>