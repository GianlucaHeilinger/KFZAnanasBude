<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
if(isset($_GET['rechnungsid']))
{
$rechnungsnummer=$_GET['rechnungsid'];
}
else
{
    $stmt = $pdo->prepare("SELECT MAX(rechnungsnummer) AS max_re FROM rechnung");
    $stmt -> execute();
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    $max_re = $result['max_re'];

$sql ="INSERT INTO `rechnung` (`rechnungid`, `repid`, `rechnungsnummer`, `rechnungsdatum`, `kundenid`, `fahrzeugid`, `summe`, `status`) VALUES (?,?,?,?,?,?,?,?)";
$statement= $pdo->prepare($sql);
$statement->execute(array(NULL, NULL, $max_re+1, date("Y-m-d H:i:s"), null, NULL, NULL, NULL));

$stmt = $pdo->prepare("SELECT MAX(rechnungid) AS max_reId FROM rechnung");
$stmt -> execute();
$result = $stmt -> fetch(PDO::FETCH_ASSOC);
$max_reId = $result['max_reId'];

$rechnungsnummer=$max_reId;
echo $rechnungsnummer;
}

    echo '<div class="row bg-dark text-white pt-3 pb-3">';
    echo '<div class="col-4 text-center">REPARATUR ID: ' . $rechnungsnummer . '</div>';
    echo '</div>';
    echo '<br />'; 
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark btn-new-car mb-3 mb-lg-0" data-toggle="modal" data-target="#partaddmodal">Teil hinzufügen</button>
<!-- End Trigger -->

<br />
<hr />

<!-- AUFTRAGSTABELLE -->
<table id="contractdetailtable" class="display table table-hover">
    <thead class="thead-dark">
        <tr>
            <th><center>Teile ID</center></th>
            <th><center>Menge</center></th>
            <th>Bezeichnung</th>
            <th>Teileart</th>
            <th><center>Preis</center></th>
            <th><center>Löschen</center></th>
        </tr>
    </thead>
    <tbody>
<?php

$sql2 = "SELECT rechnungsteile.rechnungsteileid, rechnungsteile.teileid, rechnungsteile.anzahl, teile.bezeichnung, teile.teileart, teile.preis from rechnungsteile LEFT JOIN teile ON rechnungsteile.teileid = teile.teileid WHERE rechnungsid = $rechnungsnummer";

$result2 = $pdo->query($sql2);

$total = 0;

while($row2 = $result2->fetch()) {
    echo "ananas";
    $rowsum = $row2['anzahl'] * $row2['preis'];
    $total += $rowsum;
    echo '<tr>';
    echo '<td><center>' . $row2['teileid'] . '</center></td>';
    echo '<td><center>' . $row2['anzahl'] . '</center></td>';
    echo '<td>' . $row2['bezeichnung'] . '</td>';
    echo '<td>' . $row2['teileart'] . '</td>';
    echo '<td class="text-right">&euro; ' . number_format($row2['preis'], 2, ',', '.') . '</td>';
    echo '<td class="text-right">&euro; ' . number_format($rowsum, 2, ',', '.') . '</td>';
    echo '</tr>';
};
?>
</body>
</table>
<!-- -->
<hr />

<!-- MODAL PART ADD -->
<div class="modal fade" id="partaddmodal" tabindex="-1" role="dialog" aria-labelledby="partaddmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="partaddmodalLongTitle">Teil hinzufügen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="invoice_save_edited.php" method="get">
                <div class="form-group">
                    <div class="card border-dark">
                        <div id="new-part" class="card-header">
                        Teil hinzufügen
                        </div>
                        <div class="card-body text-dark">
                         <!--<h5 class="card-title">PLATZHALTER</h5>-->
                            <p class="card-text">
                                <div class="row mb-1">
                                    <!-- <div class="col-12 pb-3"><input type="text" class="form-control"  name="searchteile" id="searchteile" placeholder="Teil suchen..." autocomplete="off"></div>-->
                                    <div class="col-5 pt-2"><label for="bezeichnung">Bezeichnung</label></div>
                                    <div class="col-7"><select id="teileselect" name='teileid' size="1" class="form-control">
                                        <?php
                                            $sql3 = "SELECT teileid, bezeichnung FROM teile";

                                            foreach ($pdo->query($sql3) as $row3) {
                                                echo '<option value="' . $row3['teileid'] . '">' . $row3['bezeichnung'] . '</option>';
                                            };
                                        ?>
                                    </select></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="anzahl">Anzahl</label></div>
                                    <div class="col-7"><input type="number" name="anzahl" class="form-control"></div>
                                    <span><input type="hidden" name="rechnungsid" value="<?php echo $rechnungsnummer ?>"></span>
                                </div>                             
                            </p>
                        </div>
                    </div>
            </div> <!-- modal body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                <button type="submit" name="submit" value="Speichern" class="btn btn-dark">Teil speichern</button>
            </div>
                </div>
                </form>
        </div>
    </div>
</div>
<!-- MODAL ENDE -->

<!-- MODAL PART ADD -->
<div class="modal fade" id="partaddmodalalreadycreated" tabindex="-1" role="dialog" aria-labelledby="partaddmodalalreadycreatedTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="partaddmodalalreadycreatedLongTitle">Rechnung bereits erstellt!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Hinzufügen von Teilen nicht mehr möglich!
            </div> <!-- modal body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
            </div>
                </div>
                </form>
        </div>
    </div>
</div>
<!-- MODAL ENDE -->

<script>/*

$(document).ready(function () {
    //console.log("test");
    $('#searchteile').change(function(){
        var current = $('#searchteile').val();
        
        $.ajax({
            url: "json_teile.php",
            method: "POST",
            data:{query:current},
            dataType: "json"
        }).done(function(data) {
            //console.log(data);
            $.each(data, function(i, value) {
                $('#teileselect').append($('<option>').text(value).attr('value', value));
            });
        }).fail(function(xhr, status, error) {
            console.log( "error: ", error );
        })
    });
        
        
        
    });

*/</script>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>