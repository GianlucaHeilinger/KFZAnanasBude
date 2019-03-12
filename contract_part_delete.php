<?php
include_once('connection.php');
$reparaturteileid=$_GET['reparaturteileid'];
$repid=$_GET['repid'];

$sql = "DELETE FROM reparaturteile WHERE reparaturteileid=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$reparaturteileid]);

header("Refresh: 0; url=contract_detail.php?repid={$repid}");
?>