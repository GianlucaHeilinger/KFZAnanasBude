<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
$repid = $_GET['repid'];
?>


<!-- AUFTRAGSINFORMATIONEN -->
<?php
$sql = "SELECT repid, fzid, datum, rechnungerstellt FROM reparatur WHERE repid = $repid ORDER BY repid DESC";
        
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();

    echo '<div class="row bg-dark text-white pt-3 pb-3">';
    echo '<div class="col-4 text-center">REPARATUR ID: ' . $result['repid'] . '</div>';
    echo '<div class="col-4 text-center">REPARATUR FAHRZEUG ID: ' . $result['fzid'] . '</div>';
    echo '<div class="col-4 text-center">REPARATUR DATUM: ' . $result['datum'] . '</div>';
    echo '</div>';
    echo '<br />'; 
?>
<!-- -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark btn-new-car mb-3 mb-lg-0" data-toggle="modal" data-target="#partaddmodal<?php 
        if ($result['rechnungerstellt'] > 0) {
            echo 'alreadycreated';
        } else {
            echo '';
        };
    ?>">Teil hinzufügen</button>
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

$sql2 = "SELECT reparaturteile.reparaturteileid, reparaturteile.teileid, reparaturteile.anzahl, teile.bezeichnung, teile.teileart, teile.preis from reparaturteile LEFT JOIN teile ON reparaturteile.teileid = teile.teileid WHERE repid = $repid";

$result2 = $pdo->query($sql2);


while($row = $result2->fetch()) {
    echo '<tr>';
    echo '<td><center>' . $row['teileid'] . '</center></td>';
    echo '<td><center>' . $row['anzahl'] . '</center></td>';
    echo '<td>' . $row['bezeichnung'] . '</td>';
    echo '<td>' . $row['teileart'] . '</td>';
    echo '<td class="text-right">&euro; ' . sprintf('%0.2f', $row['preis']) . '</td>';
    echo '<td><center><a href="contract_part_delete.php?reparaturteileid=' . $row['reparaturteileid'] . '&repid=' . $repid . '"><i class="far fa-trash-alt"></i></a></center></td>';
    echo '</tr>';
};
?>


</body>
</table>
<!-- -->
<hr />

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark btn-new-car mb-3 mb-lg-0 p-3" data-toggle="modal" data-target="#createinvoicemodal<?php 
        if ($result['rechnungerstellt'] > 0) {
            echo 'alreadycreated';
        } else {
            echo '';
        };
    ?>">RECHNUNG ERSTELLEN</button>
<!-- End Trigger -->

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
                <form action="contract_save_edited.php" method="get">
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
                                    <span><input type="hidden" name="repid" value="<?php echo $repid ?>"></span>
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


<!-- MODAL CREATE INVOICE -->
<div class="modal fade" id="createinvoicemodal" tabindex="-1" role="dialog" aria-labelledby="createinvoicemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createinvoicemodalLongTitle">Rechnung erstellen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="invoice_save.php" method="post">
                <h5>Auftrag abschließen und Rechnung aus Auftrag Nr. <?php echo $repid ?> erstellen?</h5>
                <br />
                <input type="hidden" name="repid" value="<?php echo $repid ?>"/>
                    <div class="row">
                        <div class="col-12">
                            <p>Rechnungsnummer eingeben. Letzte war: 
                            <?php
                                $stmt = $pdo->prepare("SELECT MAX(rechnungsnummer) AS max_re FROM rechnung");
                                $stmt -> execute();
                                $result = $stmt -> fetch(PDO::FETCH_ASSOC);
                                $max_re = $result['max_re'];

                                if ($max_re > 0) {
                                    echo $max_re;
                                } else {
                                    echo '0';
                                }                                
                            ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7"><label for="rechnungsnummer">Rechnungsnummer</label></div>
                        <div class="col-5"><input name='rechnungsnummer' type='number' min="<?php echo ($max_re +1) ?>" step="1" value="<?php echo ($max_re +1) ?>"/></div>
                    </div>
                     
                </div> <!-- modal body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                    <button type="submit" name="submit" value="Speichern" class="btn btn-dark">Rechnung erstellen</button>
                </form>
            </div>                
        </div>
    </div>
</div>
<!-- MODAL ENDE -->

<!-- MODAL CREATE INVOICE -->
<div class="modal fade" id="createinvoicemodalalreadycreated" tabindex="-1" role="dialog" aria-labelledby="createinvoicemodalalreadycreatedTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createinvoicemodalalreadycreatedLongTitle">Rechnung bereits erstellt!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    $sqlrechnungsnummer = "SELECT rechnung.rechnungsnummer FROM rechnung LEFT JOIN reparatur ON rechnung.repid = reparatur.repid WHERE rechnung.repid = {$repid}";
        
                    $stmtrechnungsnummer = $pdo->prepare($sqlrechnungsnummer);
                    $stmtrechnungsnummer->execute();
                    $resultrechnungsnummer = $stmtrechnungsnummer->fetch();
                ?>
                <a href="invoices/Rechnung_<?php echo $resultrechnungsnummer['rechnungsnummer'] ?>.pdf">Rechnung_<?php echo $resultrechnungsnummer['rechnungsnummer'] ?></a>
                     
                </div> <!-- modal body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                </form>
            </div>                
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