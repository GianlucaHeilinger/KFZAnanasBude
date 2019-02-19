<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark btn-new-car mb-3 mb-lg-0" data-toggle="modal" data-target="#customernewmodal">
    Neuer Kunde
    </button>
<!-- End Trigger -->

    <br /><hr />


    <table id="customertable" class="display table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Kd.Nr.</th>
                <th>Anrede</th>
                <th>Titel</th>
                <th>Vorname</th>
                <th>Nachname</th>
                
                <th>Strasse</th>
                <th>PLZ</th>
                <th>Ort</th>
                <th>Telefon</th>
                
                <th><center>Detail</center></th>
                <th><center>Rechnungen</center></th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            $sql = "SELECT * from kunde ORDER BY kundennummer ASC";

            foreach ($pdo->query($sql) as $row) {
                echo "<tr href='customer_detail.php?kundennummer=" . $row['kundennummer'] . "'><td>" . $row['kundennummer'] . "</td>";
                echo "<td>" . $row['anrede'] . "</td>";
                echo "<td>" . $row['titel'] . "</td>";
                echo "<td>" . $row['vorname'] . "</td>";
                echo "<td>" . $row['nachname'] . "</td>";
                
                echo "<td>" . $row['strasse'] . "</td>";
                echo "<td>" . $row['plz'] . "</td>";
                echo "<td>" . $row['ort'] . "</td>";
                echo "<td>" . $row['telefon'] . "</td>";
               
                echo "<td><a title='Details' class='' href='customer_detail.php?kundennummer=" . $row['kundennummer'] . "'><center><i class='fas fa-info-circle'></i></center></a></td>";
                echo "<td><a title='Rechnungen' class='' href='rechnungen.php?kundennummer=" . $row['kundennummer'] . "'><center><i class='fas fa-file-invoice'></i></center></a></td></tr>"; ?>
                
            <?php }; ?>

        </tbody>
    </table>

<!-- MODAL NEW CUSTOMER -->
<div class="modal fade" id="customernewmodal" tabindex="-1" role="dialog" aria-labelledby="customernewmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customernewmodalLongTitle">Neuer Kunde</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="customer_save.php" method="get">
                <div class="form-group">
                    <div class="card border-dark">
                        <div id="new-car" class="card-header">
                        Neuer Kunde
                        </div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">PLATZHALTER</h5>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-5"><label for="anrede">Anrede</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="anrede"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="titel">Titel</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="titel"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="vorname">Vorname</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="vorname"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="nachname">Nachname</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="nachname"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="gebdat">Geburtsdatum</label></div>
                                    <div class="col-7"><input type="date" class="form-control" id="gebdat" name="gebdat"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="strasse">Strasse</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="strasse"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="plz">PLZ</label></div>
                                    <div class="col-7"><td><input type="number" class="form-control" name="plz"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="ort">Ort</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="ort"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="telefon">Telefon</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="telefon"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="email">EMail</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="email"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="newsletter">Newsletter</label></div>
                                    <div class="col-7"><input type="checkbox" class="form-control" name="newsletter[]" value="1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="kommentar">Kommentar</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="kommentar"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><label for="kundeseit">Kunde Seit</label></div>
                                    <div class="col-7"><input type="date" class="form-control" id="kundeseit" name="kundeseit"></div>
                                </div>
                            </p>
                        </div>
                    </div>
            </div> <!-- modal body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                <button type="submit" name="submit" value="Speichern" class="btn btn-dark">Kunde speichern</button>
            </div>
                </div>
                </form>
        </div>
    </div>
</div>
<!-- MODAL ENDE -->


<!-- </body> from footer.php -->

<?php include('footer.php') ?>