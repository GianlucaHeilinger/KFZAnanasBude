<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php
    $anrede = $_GET['anrede'];
    $titel = $_GET['titel'];
    $vorname = $_GET['vorname'];
    $nachname = $_GET['nachname'];
    $gebdat = $_GET['gebdat'];
    $strasse = $_GET['strasse'];
    $plz = $_GET['plz'];
    $ort = $_GET['ort'];
    $telefon = $_GET['telefon'];
    $email = $_GET['email'];

    if(isset($_GET['newsletter']) && in_array('1', $_GET['newsletter'])) {
        $newsletter = 1;
    } else {
        $newsletter = 0;
    }

    // $newsletter = $_GET['newsletter'];

    $kommentar = $_GET['kommentar'];
    $kundeseit = $_GET['kundeseit'];

    $statement = $pdo->prepare("INSERT INTO kunde (anrede, titel, vorname, nachname, gebdat, strasse, plz, ort, telefon, email, newsletter, kommentar, kundeseit)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $statement->execute(array($anrede, $titel, $vorname, $nachname, $gebdat, $strasse, $plz, $ort, $telefon, $email, $newsletter, $kommentar, $kundeseit));

    echo "Gespeichert wurde: " . " " . $anrede . " " . $titel . " " . $vorname .  " " . $nachname .  " " . $gebdat .  " " . $strasse .  " " . $plz . " " . $ort . " " . $telefon . " " . $email . " " . $newsletter . " " . $kommentar . " " . $kundeseit;
    echo "Newsletter war: " . " " . $newsletter;

    $kundennummer = $pdo->lastInsertId();
    $url = "customer_detail.php?kundennummer={$kundennummer}";
    header("Refresh: 1; url={$url}");


?>

<!-- </body> from footer.php -->

<?php include('footer.php') ?>