<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->



<!-- Button trigger modal -->
<button type="button" class="btn btn-dark btn-new-car mb-3 mb-lg-0" data-toggle="modal" data-target="#invoicenewmodal">
    Neue Rechnung
    </button>
<!-- End Trigger -->

<br /><hr />


<table id="invoicetable" class="display table table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Re. Nr.</th>
            <th>Re. Datum</th>
            <th>Kd. Nr.</th>
            <th>Kunde</th>
            <th>Fahrzeug</th>
            
            <th>Kennzeichen</th>
            <th>Gesamtpreis</th>
            <th>Status</th>
            
            <th><center>Detail</center></th>
            <th><center>Bearbeiten</center></th>
        </tr>
    </thead>
    <tbody>
    <?php
        
        $sql = "SELECT  rechnung.rechnungsnummer, 
                        rechnung.rechnungsdatum, 
                        kunde.kundennummer, 
                        kunde.nachname, 
                        kunde.vorname, 
                        fahrzeug.marke, 
                        fahrzeug.type, 
                        fahrzeug.kennzeichen, 
                        rechnung.summe,  
                        rechnung.status 
                        FROM rechnung 
                        LEFT JOIN kunde 
                        ON rechnung.kundenid = kunde.kundennummer 
                        LEFT JOIN fahrzeug 
                        ON rechnung.fahrzeugid = fahrzeug.fzid 
                        #LEFT JOIN rechnungdetails 
                        #ON rechnung.rechnungsnummer = rechnungdetails.rechnungsnummer 
                        ORDER BY rechnung.rechnungsnummer DESC";
        
        $result = $pdo->query($sql);

        while($row = $result->fetch())
{
    echo "<tr href='invoicde_detail.php?rechnungsnummer=" . $row['rechnungsnummer']."'>";
    echo "<td>" . $row["rechnungsnummer"] . "</td>";
    echo "<td>" . $row["rechnungsdatum"] . "</td>";
    echo "<td>" . $row["kundennummer"] . "</td>";
    echo "<td>" . $row["nachname"] . " ". $row["vorname"] . "</td>";
    echo "<td>" . $row["marke"] . " ". $row["type"] . "</td>";
    echo "<td>" . $row["kennzeichen"] . "</td>";
    echo "<td>&euro; " . sprintf('%0.2f', $row['summe']) . "</td>";
    echo "<td>" . $row["status"] . "</td>";
    echo "<td><a href='invoice_detail.php?rechnungsnummer=".$row['rechnungsnummer']."'><center><i class='fas fa-info-circle'></i></center></a></td>";
    echo "<td><a  data-toggle='modal' data-target='#invoiceeditmodal" . $row["rechnungsnummer"]."' name='id'><center><i class='fas fa-file-invoice'></i></center></a></td>";
    
    echo "</tr>";
?>
    <!-- MODAL UPDATE INVOICE -->
    <div class="modal fade" id="invoiceeditmodal<?php echo $row["rechnungsnummer"] ?>" tabindex="-1" role="dialog" aria-labelledby="invoiceeditmodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceeditmodalLongTitle">Rechnung bearbeiten</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="invoice_save_edited.php?rechnungsnummer=<?php echo $row["rechnungsnummer"] ?>" method="get">
                    <div class="form-group">
                        <div class="card border-dark">
                            <div id="invoice_edit" class="card-header">
                            Rechnung bearbeiten
                            </div>
                            <div class="card-body text-dark">
                            <h5 class="card-title">Rechnungsnummer: <?php echo $row["rechnungsnummer"] ?></h5>
                                <p class="card-text">
                                    <input name='rechnungsnummer' type='hidden' value="<?php echo $row['rechnungsnummer'] ?>"/>
                                    <div class="row mb-1">
                                        <div class="col-5 pt-2"><label for="rechnungsdatum">Rechnungsdatum</label></div>
                                        <div class="col-7"><input name='rechnungsdatum' type='date' Id='rechnungsdatum' value="<?php echo $row["rechnungsdatum"] ?>"/></div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-5 pt-2"><label for="status">Status</label></div>
                                        <div class="col-7"><select name="status" size="1"><option selected="selected" value="<?php echo $row["status"] ?>">offen</option><option value="bezahlt">bezahlt</option></select></div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-5 pt-2"><label for="preis">Preis</label></div>
                                        <div class="col-7"><input maxlength='11' name='preis' Id='preis' type='number' min=0 step="0.01" value="<?php echo $row["preis"] ?>"/></div>
                                    </div>                               
                                </p>
                            </div>
                        </div>
                </div> <!-- modal body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                    <button type="submit" name="submit" value="Speichern" class="btn btn-dark">Rechnung speichern</button>
                </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- MODAL ENDE -->

<?php
}

echo "</tbody>";
echo "</table>";
?>



<!-- MODAL NEW INVOICE -->
<div class="modal fade" id="invoicenewmodal" tabindex="-1" role="dialog" aria-labelledby="invoicenewmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">Neue Rechnung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="invoice_save.php" method="get">
                <div class="form-group">
                    <div class="card border-dark">
                        <div id="new-car" class="card-header">
                        Neue Rechnung
                        </div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">PLATZHALTER</h5>
                            <p class="card-text">
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="rechnungsnummer">Rechnungsnummer</label></div>
                                    <div class="col-7"><input type="nummber" class="form-control" name="rechnungsnummer"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="rechnungsdatum">Rechnungsdatum</label></div>
                                    <div class="col-7"><input type="date" class="form-control" name="rechnungsdatum"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="kundenid">Kunden ID</label></div>
                                    <div class="col-7"><input type="number" class="form-control" name="kundenid"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="fahrzeugid">Fahrzeug ID</label></div>
                                    <div class="col-7"><input type="number" class="form-control" name="fahrzeugid"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="status">Status</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="status"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="teileid">Teile ID</label></div>
                                    <div class="col-7"><input type="number" class="form-control" name="teileid"></div>
                                </div>
                                
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="gesamtpreis">Gesamtpreis</label></div>
                                    <div class="col-7"><input type="number" class="form-control" name="gesamtpreis"></div>
                                </div>
                            </p>
                        </div>
                    </div>
            </div> <!-- modal body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                <button type="submit" name="submit" value="Speichern" class="btn btn-dark">Rechnung speichern</button>
            </div>
                </div>
                </form>
        </div>
    </div>
</div>
<!-- MODAL ENDE -->


<!-- </body> from footer.php -->

<?php include('footer.php') ?>