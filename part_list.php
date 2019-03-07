<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
$sql ="SELECT * FROM `teile`";

$result = $pdo->query($sql);

echo" <button type='button' class='btn btn-dark btn-new-car mb-3 mb-lg-0' data-toggle='modal' data-target='#partnewmodal'>Neues Teil</button><br /><hr />";

// echo "<a class='btn btn-dark btn-sm ml-2' href='part_new.php'>Neues Teil</a> <br /><br />";

echo "<table id='parttable' class='display table table-hover'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th>Teile Nr.</th>";
echo "<th>Bezeichnung</th>";
echo "<th>Art</th>";
echo "<th>Preis</th>";
echo "<th><center>Editieren</center></th>";
echo "<th><center>Löschen</center></th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// output data of each row
while($row = $result->fetch())
{
    echo "<tr href='part_edit.php?teileid=" . $row['teileid']."'>";
    echo "<td>".$row["teileid"]."</td>";
    echo "<td>".$row["bezeichnung"]."</td>";
    echo "<td>".$row["teileart"]."</td>";
    echo "<td>".$row["preis"]."</td>";
    echo "<td><a name='id' class='' href='part_edit.php?teileid=" . $row['teileid']."'><center><i class='fas fa-file-invoice'></i></center></a></td>";
    echo "<td><a href='part_delete.php?teileid=".$row['teileid']."'><center><i class='far fa-trash-alt'></i></center></a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>

<!-- MODAL NEW CUSTOMER -->
<div class="modal fade" id="partnewmodal" tabindex="-1" role="dialog" aria-labelledby="partnewmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="partnewmodalLongTitle">Neuer Kunde</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="part_save.php" method="post">
                <div class="form-group">
                    <div class="card border-dark">
                        <div id="new-part" class="card-header">
                        Neues Teil
                        </div>
                        <div class="card-body text-dark">
                         <!--<h5 class="card-title">PLATZHALTER</h5>-->
                            <p class="card-text">
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="anrede">Bezeichnung</label></div>
                                    <div class="col-7"><input name='txtBezeichnung' type='text' Id='bezeichnung' value=''/></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="titel">Art</label></div>
                                    <div class="col-7"><select name="teileart" size="1"><option selected="selected" value="Lohn">Lohn</option><option value="Teil">Teil</option></select></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="vorname">Preis</label></div>
                                    <div class="col-7"><input maxlength='11' name='txtPreis' Id='preis' type='number' min=0 step="0.01" value=''/></div>
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