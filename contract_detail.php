<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark btn-new-car mb-3 mb-lg-0" data-toggle="modal" data-target="#contractnewmodal">
    Neuer Auftrag
    </button>
<!-- End Trigger -->

<br /><hr />


<table id="contracttable" class="display table table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Teile ID</th>
            <th>Menge</th>
            <th>Bezeichnung</th>
            <th>Teileart</th>
            <th>Preis</th>
            
            <th><center>Detail</center></th>
            <th><center>Bearbeiten</center></th>
        </tr>
    </thead>
    <tbody>

<?php
$repid = $_GET['repid'];

$sql = "SELECT repid, fzid, datum FROM reparatur WHERE repid = $repid ORDER BY repid DESC";
        
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();

    echo 'reparatur repid: ' . $result['repid'];
    echo '<br />';
    echo 'reparatur fzid: ' . $result['fzid'];
    echo '<br />';
    echo 'reparatur datum: ' . $result['datum'];
    echo '<br /><br /><br />'; 

$sql2 = "SELECT reparaturteile.teileid, reparaturteile.anzahl, teile.bezeichnung, teile.teileart, teile.preis from reparaturteile LEFT JOIN teile ON reparaturteile.teileid = teile.teileid WHERE repid = $repid";

$result2 = $pdo->query($sql2);


while($row = $result2->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['teileid'] . '</td>';
    echo '<td>' . $row['anzahl'] . '</td>';
    echo '<td>' . $row['bezeichnung'] . '</td>';
    echo '<td>' . $row['teileart'] . '</td>';
    echo '<td class="text-right">&euro; ' . $row['preis'] . '</td>';
    echo '<td><center>.</center></td>';
    echo '<td><center>.</center></td>';
    echo '</tr>';
};
?>


</body>
</table>


<!-- </body> from footer.php -->

<?php include('footer.php') ?>