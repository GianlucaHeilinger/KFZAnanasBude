<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
$kundennummer = $_GET['kundennummer'];

$sql = "SELECT * FROM kunde WHERE kundennummer = '$kundennummer'";

$stmt = $pdo->prepare("SELECT * FROM kunde WHERE kundennummer = '$kundennummer'");
$stmt->execute();
$result = $stmt->fetch();

?>

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
        <div class="card border-dark">
            <div class="card-header">
                <i class="fas fa-users"></i><span class="font-weight-bold"><?php echo ' ' . $result['nachname'] . ' ' . $result['vorname'] ?></span>
                <div class="float-right">
                    <a style="cursor: pointer;" class='' data-toggle="modal" data-target="#customerdeletemodal"><i class="far fa-trash-alt"></i></a>

                    <!-- Button trigger modal -->
                        <a style="cursor: pointer;" class="" data-toggle="modal" data-target="#customereditmodal"><i class="far fa-edit"></i></a>
                    <!-- End trigger -->
                    
                </div>
            </div>
            <div class="card-body text-dark">
                <h5 class="card-title">PLATZHALTER</h5>
                <p class="card-text">
                    <div class="row">
                        <div class="col-6 col-md-4">Kundennummer:</div>
                        <div class="col-6 col-md-8"><?php echo $result['kundennummer'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Anrede:</div>
                        <div class="col-6 col-md-8"><?php echo $result['anrede'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Titel:</div>
                        <div class="col-6 col-md-8"><?php echo $result['titel'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Vorname:</div>
                        <div class="col-6 col-md-8"><?php echo $result['vorname'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Nachname:</div>
                        <div class="col-6 col-md-8"><?php echo $result['nachname'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Geburtsdatum</div>
                        <div class="col-6 col-md-8"><?php echo $result['gebdat'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Strasse:</div>
                        <div class="col-6 col-md-8"><?php echo $result['strasse'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">PLZ:</div>
                        <div class="col-6 col-md-8"><?php echo $result['plz'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Ort:</div>
                        <div class="col-6 col-md-8"><?php echo $result['ort'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Telefon:</div>
                        <div class="col-6 col-md-8"><?php echo $result['telefon'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Email:</div>
                        <div class="col-6 col-md-8"><?php echo $result['email'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Newsletter:</div>
                        <div class="col-6 col-md-8">
                            <?php 
                                if ($result['newsletter'] == 1) {
                                    echo "Ja";
                                } else {
                                    echo "Nein";
                                } 
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Kommentar:</div>
                        <div class="col-6 col-md-8"><?php echo $result['kommentar'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">Kunde seit:</div>
                        <div class="col-6 col-md-8"><?php echo $result['kundeseit'] ?></div>
                    </div>
                </p>
            </div> <!-- card body text dark -->
        </div> <!-- card -->

        <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark btn-new-car mb-3 mb-lg-0 p-3" data-toggle="modal" data-target="#newcarmodal">
                <i class="fas fa-car text-white"></i> Neues Fahrzeug
            </button>
        <!-- End Trigger -->

        <!-- Button new_repair -->
            <a href="repair_new.php"><button type="button" class="btn btn-dark btn-new-car mb-3 mb-lg-0 p-3">
                <i class="fas fa-tools text-white"></i> Neue Reparatur
            </button></a>
        <!-- End Button -->

            

    </div> <!-- col -->
              

    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
    <div class="row">

    <?php
    $sql = "SELECT * from fahrzeug WHERE kundeid = $kundennummer ORDER BY fzid ASC";

    foreach ($pdo->query($sql) as $row) {
        echo '<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">';
        echo '<div class="card border-dark mb-3 ml-0 ml-lg-3 mt-3 mt-lg-0" style="width: 100%;">';
        echo '<div class="card-header"><i class="fas fa-car"></i><span class="font-weight-bold">'  . " " . $row['marke'] . " " . $row['type'] . '</span><!-- Button trigger modal --><a style="cursor: pointer;" class="float-right" data-toggle="modal" data-target="#cardeletemodal' . $row['fzid'] . '"><i class="far fa-trash-alt"></i></a><!-- End Trigger --></div>';
        echo '<div class="card-body text-dark">';
        echo '<h5 class="card-title">' . $row['kennzeichen'] . '</h5>';
        echo '<p class="card-text">' 
        .'Fahrgestellnummer: ' . $row['fahrgestellnummer'] . '<br />'
        .'Nationalcode: ' . $row['nationalcode'] . '<br />'
        .'Motorkennzeichen: ' . $row['motorkennzeichen'] . '<br />' 
        .'Getriebekennzeichen: ' . $row['getriebekennzeichen'] . '<br />'
        .'Farbe: ' . $row['farbe'] . '<br />'
        .'Treibstoff: ' . $row['treibstoff'] . '<br />'
        .'Leistung: ' . $row['leistung'] . '<br />'
        .'Hubraum: ' . $row['hubraum'] . '<br />'
        .'Erstzulassung: ' . $row['erstzulassung'] . '<br />'
        .'</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>'; ?>

        <!-- MODAL DELETE CAR -->
        <div class="modal fade" id="cardeletemodal<?php echo $row['fzid'] ?>" tabindex="-1" role="dialog" aria-labelledby="cardeletemodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cardeletemodalLongTitle">Fahrzeug wirklich löschen?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="car_delete.php" method="get">
                        <input type="hidden" name="fzid" value="<?php echo $row['fzid'] ?>">
                        Wollen Sie das Fahrzeug mit der ID <?php echo $row['fzid'] ?> wirklich löschen?<br />                                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-dark">Fahrzeug löschen</button>
                </div>
                    </form>
            </div>
        </div>
        </div>
        <!-- MODAL ENDE -->

    <?php } ?>

    </div>
    </div>



</div>



<!-- MODAL CUSTOMER EDIT -->
<div class="modal fade" id="customereditmodal" tabindex="-1" role="dialog" aria-labelledby="customereditmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customereditmodalLongTitle"><?php echo $result['nachname'] . " " . $result['vorname']; ?> bearbeiten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    
            <?php 
            $kundennummer = $_GET['kundennummer'];

            $sql = "SELECT * FROM kunde WHERE kundennummer = '$kundennummer'";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            ?>

                <form action="customer_save_edited.php" method="get">
                <div class="form-group">
                    <div class="card border-dark">
                        <div id="new-car" class="card-header">
                        <?php echo $result['nachname'] . " " . $result['vorname']; ?>
                        </div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">PLATZHALTER</h5>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-5"><label for="kunde">Kunde</label></div>
                                    <div class="col-7"><input type="hidden" class="form-control" name="kundennummer" value="<?php echo $kundennummer; ?>">
                                    <?php echo $result['nachname'] . " " . $result['vorname']; ?></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="anrede">Anrede</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="anrede" value="<?php echo $result['anrede'] ?>"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="titel">Titel</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="titel" value="<?php echo $result['titel'] ?>"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="vorname">Vorname</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="vorname" value="<?php echo $result['vorname'] ?>"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="nachname">Nachname</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="nachname" value="<?php echo $result['nachname'] ?>"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="gebdat">Geburtsdatum</label></div>
                                    <div class="col-7"><input type="date" class="form-control" name="gebdat" value="<?php echo $result['gebdat'] ?>"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="strasse">Strasse</label></div>
                                    <div class="col-7"><td><input type="text" class="form-control" name="strasse" value="<?php echo $result['strasse'] ?>"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="plz">PLZ</label></div>
                                    <div class="col-7"><input type="number" class="form-control" name="plz" value="<?php echo $result['plz'] ?>"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="ort">Ort</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="ort" value="<?php echo $result['ort'] ?>"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="telefon">Telefon</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="telefon" value="<?php echo $result['telefon'] ?>"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="email">EMail</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="email" value="<?php echo $result['email'] ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 pt-2"><label for="hubraum">Newsletter</label></div>
                                    <div class="col-7">
                                        <select name="newsletter" class="form-control" size="1">
                                            <?php 
                                                if ($result['newsletter'] == 0) { ?>
                                                    <option selected="selected" value="<?php echo $result['newsletter'] ?>">Nein</option>
                                                    <option value="1">Ja</option>
                                                <?php } else { ?>
                                                    <option selected="selected" value="1">Ja</option>
                                                    <option value="0">Nein</option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="kommentar">Kommentar</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="kommentar" value="<?php echo $result['kommentar'] ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 pt-2"><label for="kundeseit">Kunde seit</label></div>
                                    <div class="col-7"><input type="date" class="form-control" name="kundeseit" value="<?php echo $result['kundeseit'] ?>"></div>
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

<!-- MODAL NEW CAR -->
<div class="modal fade" id="newcarmodal" tabindex="-1" role="dialog" aria-labelledby="newcarmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newcarmodalLongTitle">Neues Fahrzeug</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    
            <?php 
            $kundennummer = $_GET['kundennummer'];

            $sql = "SELECT * FROM kunde WHERE kundennummer = '$kundennummer'";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            ?>

                <form action="save_car.php" method="get">
                    <div class="form-group">
                    <div class="card border-dark">
                        <div id="new-car" class="card-header">
                        <?php echo $result['nachname'] . " " . $result['vorname']; ?>
                        </div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">PLATZHALTER</h5>
                            <p class="card-text">
                                <div class="row mb-1">
                                    <div class="col-5"><label for="kunde">Kunde</label></div>
                                    <div class="col-7"><input type="hidden" class="form-control" name="kundennummer" value="<?php echo $kundennummer; ?>">
                                    <?php echo $result['nachname'] . " " . $result['vorname']; ?></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="marke">Marke</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="marke"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="type">Type</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="type"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="kennzeichen">Kennzeichen</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="kennzeichen"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="fahrgestellnummer">Fahrgestellnummer</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="fahrgestellnummer"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="nationalcode">Nationalcode</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="nationalcode"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="motorkennzeichen">Motorkennzeichen</label></div>
                                    <div class="col-7"><td><input type="text" class="form-control" name="motorkennzeichen"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="getriebekennzeichen">Getriebekennzeichen</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="getriebekennzeichen"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="farbe">Farbe</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="farbe"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="treibstoff">Treibstoff</label></div>
                                    <div class="col-7"><input type="text" class="form-control" name="treibstoff"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="leistung">Leistung</label></div>
                                    <div class="col-7"><input type="number" class="form-control" name="leistung"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5 pt-2"><label for="hubraum">Hubraum</label></div>
                                    <div class="col-7"><input type="number" class="form-control" name="hubraum"></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 pt-2"><label for="erstzulassung">Erstzulassung</label></div>
                                    <div class="col-7"><input type="date" class="form-control" name="erstzulassung"></div>
                                </div>
                            </p>
                        </div>
                    </div>
            </div> <!-- modal body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                <button type="submit" name="submit" value="Speichern" class="btn btn-dark">Fahrzeug speichern</button>
            </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<!-- MODAL ENDE -->

<!-- MODAL DELETE CUSTOMER -->
<div class="modal fade" id="customerdeletemodal" tabindex="-1" role="dialog" aria-labelledby="customerdeletemodalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="customerdeletemodalLongTitle">Kunde wirklich löschen?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="customer_delete.php" method="get">
                <input type="hidden" name="kundennummer" value="<?php echo $kundennummer ?>">
                Wollen Sie den Kunden mit der Kundennummer <?php echo $kundennummer ?> wirklich löschen?<br />
                <small>Vorher müssen alle Fahrzeuge gelöscht werden</small>                                  
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
            <button type="submit" name="submit" value="submit" class="btn btn-dark">Kunde löschen</button>
        </div>
            </form>
    </div>
  </div>
</div>
<!-- MODAL ENDE -->



<!-- </body> from footer.php -->

<?php include('footer.php') ?>