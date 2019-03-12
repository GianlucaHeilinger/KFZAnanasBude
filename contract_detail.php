<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
$repid = $_GET['repid'];
?>


<!-- AUFTRAGSINFORMATIONEN -->
<?php
$sql = "SELECT repid, fzid, datum FROM reparatur WHERE repid = $repid ORDER BY repid DESC";
        
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

<!-- AUFTRAGSTABELLE -->
<table id="contracttable" class="display table table-hover">
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
<button type="button" class="btn btn-dark btn-new-car mb-3 mb-lg-0" data-toggle="modal" data-target="#partaddmodal">
    Teil hinzufügen
    </button>
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
                                    <div class="col-5 pt-2"><label for="bezeichnung">Bezeichnung</label></div>
                                    <div class="col-7"><select name='teileid' size="1" class="form-control">
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



<!-- </body> from footer.php -->

<?php include('footer.php') ?>