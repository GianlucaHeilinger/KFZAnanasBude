<?php require_once('connection.php');

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $sql = "SELECT bezeichnung FROM teile WHERE bezeichnung LIKE '%{$query}%'";
    $result = $pdo->query($sql);
	$array = array();
    while ($row = $result->fetch()) {
        $array[] = array (
            'bezeichnung' => $row['bezeichnung'],
            'value' => $row['bezeichnung'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}
?>