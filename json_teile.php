<?php require_once('connection.php');
$request = $_POST['query'];
$query = "SELECT bezeichnung FROM teile WHERE bezeichnung LIKE '%{$request}%'";
$result = $pdo->query($query);
$data = array();
while ($row = $result->fetch()) {
    $data[] = $row['bezeichnung'];
}
//RETURN JSON ARRAY
echo json_encode($data);
//echo "<script>console.log('" . json_encode($data) . "');</script>";

?>