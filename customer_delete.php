<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
header("Refresh: 3; url=customer.php");


$kundennummer = $_GET['kundennummer'];

$pdo = new PDO('mysql:host=localhost; dbname=kfzwerkstatt', 'root', '');
$statement = $pdo->prepare("DELETE FROM kunde WHERE kundennummer = ?");
$statement->execute(array($kundennummer));

echo "Gelöscht wurde die Kundennummer: " . " " . $kundennummer;

?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>