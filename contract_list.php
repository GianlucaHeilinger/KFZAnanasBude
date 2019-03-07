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
echo "<th>Fahrzeug ID</th>";
echo "<th>Datum</th>";
echo "<th><center>Editieren</center></th>";
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
        $kundenid=$row2['kundeid'];
    }

    echo "<tr href='contract_edit.php?repid=" . $row['repid']."'>";
    echo "<td>".$row["repid"]."</td>";

    if(isset($kundenid))
    {
        echo "<td><a href='customer_detail.php?kundennummer=" . $kundenid."'>".$row["fzid"]."</a></td>";
    }
    else
    {
        echo "<td>".$row["fzid"]."</td>";
    }

    echo "<td>".$row["datum"]."</td>";
    echo "<td><a data-toggle='modal' data-target='#contractupdatemodal" . $row["repid"]."' name='id'><center><i class='fas fa-file-invoice'></i></center></a></td>";
    echo "<td><a href='contract_delete.php?repid=".$row['repid']."'><center><i class='far fa-trash-alt'></i></center></a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>

<!-- MODAL NEW CONTRACT -->
<div class="modal fade" id="contractnewmodal" tabindex="-1" role="dialog" aria-labelledby="contractnewmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contractnewmodalLongTitle">Neuer Auftrag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="contract_save.php" method="post">
                <div class="form-group">
                    <div class="card border-dark">
                        <div id="new-contract" class="card-header">
                        Neuer Auftrag
                        </div>
                        <div class="card-body text-dark">
                         <!--<h5 class="card-title">PLATZHALTER</h5>-->
                            <p class="card-text">
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="fahrzeug">Fahrzeug</label></div>
                                    <div class="col-7"><select name="fahrzeug" size="1">
                                    <?php 
                                    
                                    $sql ="SELECT * FROM `fahrzeug`";

                                    $result = $pdo->query($sql);    
   
                                    while($row2 = $result2->fetch())
                                    {
                                        $kundenid=$row2['kundeid'];
                                    }

                                    ?>
                                    </select></div>
                                </div>    
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="date">Datum</label></div>
                                    <div class="col-7"><input name='date' type='date' Id='date'/></div>
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

<?php include('footer.php') ?>