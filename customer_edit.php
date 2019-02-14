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
                <td><input name="anrede" type="text" value="<?php echo $result['anrede'] ?>"/></td>
            </tr>
            <tr>
                <td>Titel</td>
                <td><input name="titel" type="text" value="<?php echo $result['titel'] ?>"/></td>
            </tr>
            <tr>
                <td>Vorname</td>
                <td><input name="vorname" type="text" value="<?php echo $result['vorname'] ?>"/></td>
            </tr>
            <tr>
                <td>Nachname</td>
                <td><input name="nachname" type="text" value="<?php echo $result['nachname'] ?>"/></td>
            </tr>
            <tr>
                <td>Geburtsdatum</td>
                <td><input name="gebdat" type="date" value="<?php echo $result['gebdat'] ?>"/></td>
            </tr>
            <tr>
                <td>Strasse</td>
                <td><input name="strasse" type="text" value="<?php echo $result['strasse'] ?>"/></td>
            </tr>
            <tr>
                <td>PLZ</td>
                <td><input name="plz" type="number" value="<?php echo $result['plz'] ?>"/></td>
            </tr>
            <tr>
                <td>Ort</td>
                <td><input name="ort" type="text" value="<?php echo $result['ort'] ?>"/></td>
            </tr>
            <tr>
                <td>Telefon</td>
                <td><input name="telefon" type="text" value="<?php echo $result['telefon'] ?>"/></td>
            </tr>
            <tr>
                <td>EMail</td>
                <td><input name="email" type="text" value="<?php echo $result['email'] ?>"/></td>
            </tr>
            <tr>
                <td>Newsletter</td>
                <td>
                    <select name="newsletter" size="1">
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
                </td>
            </tr>
            <tr>
                <td>Kommentar</td>
                <td><input name="kommentar" type="text" value="<?php echo $result['kommentar'] ?>"/></td>
            </tr>
            <tr>
                <td>Kunde seit</td>
                <td><input name="kuneseit" type="date" value="<?php echo $result['kundeseit'] ?>"/></td>
            </tr>
        
    </table>


<!-- </body> from footer.php -->

<?php include('footer.php') ?>