<?php
header("Refresh: 3; url=index.php");


$kundennummer = $_GET['kundennummer'];

$pdo = new PDO('mysql:host=localhost; dbname=kfzwerkstatt', 'root', '');
$statement = $pdo->prepare("DELETE FROM kunde WHERE kundennummer = ?");
$statement->execute(array($id));

echo "Gelöscht wurde die Kundennummer: " . " " . $kundennummer;

?>