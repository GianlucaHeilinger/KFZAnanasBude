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
<h4><?php echo $result['nachname'] . ' ' . $result['vorname'] ?></h4>
<a class='' href='customer_delete.php?kundennummer=<?php echo $kundennummer ?>'><i class="far fa-trash-alt"></i></a>
<a class='' href='customer_edit.php?kundennummer=<?php echo $kundennummer ?>'><i class="far fa-edit"></i></a>

<br /><br />

    <table class="table table-striped table-hover ml-2 mr-2">
            <tr>
                <td>Kd.Nr.</td>
                <td><?php echo $result['kundennummer'] ?></td>
            </tr>
            <tr>
                <td>Anrede</td>
                <td><?php echo $result['anrede'] ?></td>
            </tr>
            <tr>
                <td>Titel</td>
                <td><?php echo $result['titel'] ?></td>
            </tr>
            <tr>
                <td>Vorname</td>
                <td><?php echo $result['vorname'] ?></td>
            </tr>
            <tr>
                <td>Nachname</td>
                <td><?php echo $result['nachname'] ?></td>
            </tr>
            <tr>
                <td>Geburtsdatum</td>
                <td><?php echo $result['gebdat'] ?></td>
            </tr>
            <tr>
                <td>Strasse</td>
                <td><?php echo $result['strasse'] ?></td>
            </tr>
            <tr>
                <td>PLZ</td>
                <td><?php echo $result['plz'] ?></td>
            </tr>
            <tr>
                <td>Ort</td>
                <td><?php echo $result['ort'] ?></td>
            </tr>
            <tr>
                <td>Telefon</td>
                <td><?php echo $result['telefon'] ?></td>
            </tr>
            <tr>
                <td>EMail</td>
                <td><?php echo $result['email'] ?></td>
            </tr>
            <tr>
                <td>Newsletter</td>
                <td>
                    <?php 
                        if ($result['newsletter'] == 1) {
                            echo "Ja";
                        } else {
                            echo "Nein";
                        } 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Kommentar</td>
                <td><?php echo $result['kommentar'] ?></td>
            </tr>
            <tr>
                <td>Kunde seit</td>
                <td><?php echo $result['kundeseit'] ?></td>
            </tr>
        
    </table>


<div class="row">
<?php

$sql = "SELECT * from fahrzeug WHERE kundeid = $kundennummer ORDER BY fzid ASC";

foreach ($pdo->query($sql) as $row) {
    echo '<div class="card border-dark mb-3 ml-4" style="max-width: 18rem;">';
    echo '<div class="card-header"><i class="fas fa-car"></i>'  . " " . $row['marke'] . " " . $row['type'] . '<a class="float-right" href="car_delete.php?fzid=' .  $row['fzid'] . '"><i class="far fa-trash-alt"></i></a></div>';
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
}

?>
</div>


<!-- </body> from footer.php -->

<?php include('footer.php') ?>