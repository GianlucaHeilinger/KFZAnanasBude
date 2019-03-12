<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
$sql ="SELECT * FROM `reparatur`";

$result = $pdo->query($sql);

echo" <button type='button' class='btn btn-dark btn-new-car mb-3 mb-lg-0' data-toggle='modal' data-target='#contractnewmodal'>Neuer Auftrag</button><br /><hr />";

// echo "<a class='btn btn-dark btn-sm ml-2' href='part_new.php'>Neues Teil</a> <br /><br />";

echo "<table id='contracttable' class='display table table-hover'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th>Reparatur ID</th>";
echo "<th>Kunde</th>";
echo "<th>Fahrzeug</th>";
echo "<th>Datum</th>";
echo "<th><center>Detail</center></th>";
echo "<th><center>Löschen</center></th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// output data of each row
while($row = $result->fetch())
{
    $sql2 ="SELECT * FROM `fahrzeug` WHERE `fzid`=".$row['fzid'];

    $result2 = $pdo->query($sql2);    
   
    while($row2 = $result2->fetch())
    {
        $kundenid = $row2['kundeid'];
        $marke = $row2['marke'];
        $type = $row2['type'];
        $kennzeichen = $row2['kennzeichen'];
    }

    echo "<tr href='contract_edit.php?repid=" . $row['repid']."'>";
    echo "<td>".$row["repid"]."</td>";
    
    $sql3 = "SELECT titel, vorname, nachname FROM kunde WHERE kundennummer = $kundenid";
    foreach ($pdo->query($sql3) as $row3) { 
        echo '<td>' . $row3['titel'] . ' ' . $row3['nachname'] . ' ' . $row3['vorname'] . '</td>';
    }

    if(isset($kundenid))
    {
        echo "<td><i class='fas fa-external-link-alt'></i></i> <a href='customer_detail.php?kundennummer=" . $kundenid."'>".$marke . ' ' . $type . ' | ' .$kennzeichen."</a></td>";
    }
    else
    {
        echo "<td>".$row["fzid"]."</td>";
    }

    echo "<td>".$row["datum"]."</td>";
    echo "<td><a href='contract_detail.php?repid=".$row['repid']."'><center><i class='fas fa-info-circle'></i></center></a></td>";
    echo '<td><a style="cursor: pointer;" class="" data-toggle="modal" data-target="#contractdeletemodal' .$row['repid']. '"><center><i class="far fa-trash-alt"></i></center></a></td>'; 
    echo "</tr>"; ?>

    <!-- MODAL DELETE CONTRACT -->
        <div class="modal fade" id="contractdeletemodal<?php echo $row['repid'] ?>" tabindex="-1" role="dialog" aria-labelledby="contractdeletemodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contractdeletemodalLongTitle">Auftrag wirklich löschen?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="contract_delete.php" method="post">
                            <input type="hidden" name="repid" value="<?php echo $row['repid'] ?>">
                            Wollen Sie den Auftrag mit der ID <?php echo $row['repid'] ?> wirklich löschen?<br />                                 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                        <button type="submit" name="submit" value="submit" class="btn btn-dark">Auftrag löschen</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- MODAL ENDE -->
<?php }

echo "</tbody>";
echo "</table>";
?>

<!-- MODAL NEW CONTRACT -->
<div class="modal fade" id="contractnewmodal" tabindex="-1" role="dialog" aria-labelledby="contractnewmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contractnewmodalLongTitle">Neuer Auftrag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="contract_save.php" method="get">
                <div class="form-group">
                    <div class="card border-dark">
                        <div id="new-contract" class="card-header">
                        Neuen Auftrag erstellen
                        </div>
                        <div class="card-body text-dark">
                         <!--<h5 class="card-title">PLATZHALTER</h5>-->
                            <p class="card-text">
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="fzid">Fahrzeug</label></div>
                                    <div class="col-7"><select name="fzid" size="1" class="form-control">
                                    <?php 
                                    
                                    $sql ="SELECT * FROM `fahrzeug`";

                                    $result = $pdo->query($sql);    
   
                                    while($row = $result->fetch())
                                    {
                                       echo "<option value=".$row['fzid'].">".$row['fzid'] . " | " . $row['marke']  . " | " . $row['type'] . " | " . $row['kennzeichen'] . "</option>";
                                    }

                                    ?>
                                    </select></div>
                                </div>    
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="date">Datum</label></div>
                                    <div class="col-7"><input name='date' class="form-control" type='date' Id='date'/></div>
                                </div>                                                                                     
                            </p>
                        </div>
                    </div>
            </div> <!-- modal body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                <button type="submit" name="submit" value="Speichern" class="btn btn-dark">Auftrag erstellen</button>
            </div>
                </div>
                </form>
        </div>
    </div>
</div>
<!-- MODAL ENDE -->



<?php include('footer.php') ?>