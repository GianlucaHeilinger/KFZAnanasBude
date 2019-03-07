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
                <th>Rechnungsnummer</th>
                <th>Rechnungsdatum</th>
                <th>Kundennummer</th>
                <th>Kunde (NN + VN)</th>
                <th>Fahrzeug (Marke + Type)</th>
                
                <th>Kennzeichen</th>
                <th>Status</th>
                <th>Anzahl</th>
                <th>Preis</th>
                
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
                            rechnung.status, 
                            rechnungdetails.anzahl, 
                            rechnungdetails.preis 
                            FROM rechnung 
                            LEFT JOIN kunde 
                            ON rechnung.kundenid = kunde.kundennummer 
                            LEFT JOIN fahrzeug 
                            ON rechnung.fahrzeugid = fahrzeug.fzid 
                            LEFT JOIN rechnungdetails 
                            ON rechnung.rechnungsnummer = rechnungdetails.rechnungsnummer 
                            ORDER BY rechnung.rechnungsnummer DESC";

            // $sql = "SELECT * from kunde ORDER BY kundennummer ASC";

            foreach ($pdo->query($sql) as $row) {
                echo "<tr href='invoice_detail.php?kundennummer=" . $row['rechnungsnummer'] . "'><td>" . $row['rechnungsnummer'] . "</td>";
                echo "<td>" . $row['rechnungsdatum'] . "</td>";
                echo "<td>" . $row['kundennummer'] . "</td>";
                echo "<td>" . $row['nachname'] . " " . $row['vorname'] . "</td>";
                echo "<td>" . $row['marke'] . " " . $row['type'] . "</td>";
                echo "<td>" . $row['kennzeichen'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['anzahl'] . "</td>";
                echo "<td>" . $row['preis'] . "</td>";
               
                echo "<td><a title='Details' class='' href='invoice_detail.php?rechnungsnummer=" . $row['rechnungsnummer'] . "'><center><i class='fas fa-info-circle'></i></center></a></td>";
                echo "<td><a title='Bearbeiten' class='' href='invoice.php?rechnungsnummer=" . $row['rechnungsnummer'] . "'><center><i class='fas fa-file-invoice'></i></center></a></td></tr>"; ?>
                
            <?php }; ?>

        </tbody>
    </table>

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
                                    <div class="col-5 pt-2"><label for="anrede">Anrede</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="anrede"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="titel">Titel</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="titel"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="vorname">Vorname</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="vorname"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="nachname">Nachname</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="nachname"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="gebdat">Geburtsdatum</label></div>
                                    <div class="col-7"><input type="date" class="form-control" id="gebdat" name="gebdat"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="strasse">Strasse</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="strasse"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="plz">PLZ</label></div>
                                    <div class="col-7"><td><input type="number" class="form-control" name="plz"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="ort">Ort</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="ort"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="telefon">Telefon</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="telefon"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="email">EMail</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="email"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="newsletter">Newsletter</label></div>
                                    <div class="col-7"><input style="width: 25px; height: 25px;" type="checkbox" class="form-control mt-2" name="newsletter[]" value="1"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="kommentar">Kommentar</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="kommentar"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 pt-2"><label for="kundeseit">Kunde Seit</label></div>
                                    <div class="col-7"><input type="date" class="form-control" id="kundeseit" name="kundeseit"></div>
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