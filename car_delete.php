<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
header("Refresh: 3; url=customer.php");


$fzid = $_GET['fzid'];

$pdo = new PDO('mysql:host=localhost; dbname=kfzwerkstatt', 'root', '');
$statement = $pdo->prepare("DELETE FROM fahrzeug WHERE fzid = ?");
$statement->execute(array($fzid));

echo "Gelöscht wurde das Fahrzeug mit der ID: " . " " . $fzid;

?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>