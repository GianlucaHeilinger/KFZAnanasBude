<?php
include_once('connection.php');
$id=$_GET["teileid"];

$sql = "DELETE FROM teile WHERE teileid=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);

header("Refresh: 0; url=part_list.php");
?>