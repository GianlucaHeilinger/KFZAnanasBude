<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php
$fzid = $_GET['fzid'];
$datum = $_GET['date'];

$statement = $pdo->prepare("INSERT INTO reparatur (fzid, datum)VALUES(?,?)");
$statement->execute(array($fzid, $datum));

echo "Gespeichert wurde: " . " " . $fzid . " " . $datum;

$repid = $pdo->lastInsertId();
$url = "contract_detail.php?repid={$repid}";
header("Refresh: 0; url={$url}");

?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>