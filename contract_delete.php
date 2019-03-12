<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
$repid = $_POST['repid'];

// changed due to constraint (cascade)
// $stmt = $pdo->prepare("DELETE FROM reparatur WHERE repid = ?");
// $stmt->execute(array($repid));


$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
$sql = "DELETE FROM reparatur WHERE repid = :repid";
$sql2 = "DELETE FROM reparaturteile WHERE repid = :repid";
$stmt = $pdo->prepare($sql);
$stmt2 = $pdo->prepare($sql2);
$stmt->bindParam(':repid', $_POST['repid'], PDO::PARAM_INT);
$stmt2->bindParam(':repid', $_POST['repid'], PDO::PARAM_INT);    
$stmt2->execute();
$stmt->execute();


// print_r($stmt->errorInfo());
echo "Gelöscht wurde die repid: " . " " . $repid;

header("Refresh: 0; url=contract_list.php");

?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>