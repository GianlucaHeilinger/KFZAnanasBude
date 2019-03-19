<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->
<?php
$repid = $_POST['repid'];

// query um kundennummer eines auftrages zu bekommen
$sqlforkundennummer = "SELECT
kunde.kundennummer AS kundennummer
FROM kunde
LEFT JOIN fahrzeug
ON kunde.kundennummer = fahrzeug.kundeid
LEFT JOIN reparatur
ON fahrzeug.fzid = reparatur.fzid
WHERE
reparatur.repid = $repid
";

$stmtforkundennummer = $pdo->prepare($sqlforkundennummer);
$stmtforkundennummer->execute();
$resultforkundennummer = $stmtforkundennummer->fetch();
// ende query

// query um fzid eines auftrages zu bekommen
$sqlforfzid = "SELECT
fzid AS fzid
FROM reparatur
WHERE
repid = $repid
";

$stmtforfzid = $pdo->prepare($sqlforfzid);
$stmtforfzid->execute();
$resultforfzid = $stmtforfzid->fetch();
// ende query

// query für summe
$sqlforsumme = "SELECT
reparaturteile.anzahl,
teile.preis
from reparaturteile
LEFT JOIN teile
ON reparaturteile.teileid = teile.teileid
WHERE repid = $repid
";

$summe = 0;
foreach ($pdo->query($sqlforsumme) as $row) {
    $rowsum = $row['anzahl'] * $row['preis'];
    $summe = $summe + $rowsum;
};
// ende query

$rechnungsnummer = $_POST['rechnungsnummer'];
$rechnungsdatum = date("Y-m-d");

$kundennummer = $resultforkundennummer['kundennummer'];
$fzid = $resultforfzid['fzid'];
$status = 'offen';

$statement = $pdo->prepare("INSERT INTO rechnung (repid, rechnungsnummer, rechnungsdatum, kundenid, fahrzeugid, `summe`, `status`)VALUES(?,?,?,?,?,?,?)");
$statement->execute(array($repid, $rechnungsnummer, $rechnungsdatum, $kundennummer, $fzid, $summe, $status));

/*
echo 'repid '.$repid;
echo '<br />';
echo 'rechnungsnummer '.$rechnungsnummer;
echo '<br />';
echo 'rechnungsdatum '.$rechnungsdatum;
echo '<br />';
echo 'kundennummer '.$kundennummer;
echo '<br />';
echo 'fzid '.$fzid;
echo '<br />';
echo 'status '.$status;
echo '<br />';
echo 'result kdnr '.$resultforkundennummer['kundennummer'];
echo '<br />';
echo 'summe '.$summe;
echo '<br />';
echo 'result fzid '.$resultforfzid['fzid'];
echo '<br />';
*/

$rechnungerstellt = 1;
$statement2 = $pdo->prepare("UPDATE reparatur SET rechnungerstellt = ? WHERE repid = ?");
$statement2->execute(array($rechnungerstellt, $repid));

/*
echo 'rechnungerstellt '.$rechnungerstellt;
echo '<br />';
*/

// header("Refresh: 3; url=invoice.php");

////////////////////////////////////////////////////////
// RECHNUNG ERSTELLT UND GESPEICHERT. AUFTRAG GEÄNDERT.
////////////////////////////////////////////////////////
?>

<?php


////////////////////////////////////////////////////////
// PDF
////////////////////////////////////////////////////////
 
$rechnungs_nummer = $rechnungsnummer;
$rechnungs_datum = $rechnungsdatum;
$pdfAuthor = "ANANAS KFZ-BUDE";
 
$rechnungs_header = '
<img src="static/img/pp.jpg" style="border-radius: 50%; display: inline-block; vertical-align: middle;" />
ANANAS KFZ-Bude
Anna Nass
www.ananas-kfz-bude.at';
 
$sqlkunde = "SELECT * FROM kunde WHERE kundennummer = {$kundennummer}";
        
$stmtkunde = $pdo->prepare($sqlkunde);
$stmtkunde->execute();
$kunde = $stmtkunde->fetch();

$anrede = $kunde['anrede'];
$titel = $kunde['titel'];
$vorname = $kunde['vorname'];
$nachname = $kunde['nachname'];
$strasse = $kunde['strasse'];
$plz = $kunde['plz'];
$ort = $kunde['ort'];

$rechnungs_empfaenger .= $anrede;
$rechnungs_empfaenger .= ' ';
$rechnungs_empfaenger .= $titel;
$rechnungs_empfaenger .= ' ';
$rechnungs_empfaenger .= $vorname;
$rechnungs_empfaenger .= ' ';
$rechnungs_empfaenger .= $nachname;
$rechnungs_empfaenger .= ' ';
$rechnungs_empfaenger .= "<br />";
$rechnungs_empfaenger .= $strasse;
$rechnungs_empfaenger .= "<br />";
$rechnungs_empfaenger .= $plz;
$rechnungs_empfaenger .= ' ';
$rechnungs_empfaenger .= $ort;
/*
$rechnungs_empfaenger = 'Vorname Nachname
Kundenadresse
PLZ Kundenort'; */
 
$rechnungs_footer = "Wir bitten um eine Begleichung der Rechnung innerhalb von 14 Tagen nach Erhalt. Bitte Überweisen Sie den vollständigen Betrag an:
 
<b>Empfänger:</b> ANANAS KFZ-Bude
<b>IBAN</b>: AT12 345678 90123 45678
<b>BIC</b>: AT1234567";
 
//Auflistung eurer verschiedenen Posten im Format [Produktbezeichnung, Menge, Einzelpreis]
$sqlauftragsteile = "SELECT reparaturteile.anzahl, teile.bezeichnung, teile.preis FROM reparaturteile LEFT JOIN teile ON reparaturteile.teileid = teile.teileid WHERE reparaturteile.repid = {$repid}";
$result = $pdo->query($sqlauftragsteile);

$rechnungs_posten = array();
    while($row = $result->fetch())
    {
        $rechnungs_posten[] = array("{$row['bezeichnung']}", $row['anzahl'], $row['preis']);
    };


/*
$rechnungs_posten = array(
    array("Produkt 1", 1, 42.50),
    array("Produkt 2", 5, 5.20),
    array("Produkt 3", 3, 10.00)
);
 */

//Höhe eurer Umsatzsteuer. 0.20 für 20% Umsatzsteuer
$umsatzsteuer = 0.20; 
 
$pdfName = "Rechnung_".$rechnungs_nummer.".pdf";
 
 
//////////////////////////// Inhalt des PDFs als HTML-Code \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
 
 
// Erstellung des HTML-Codes. Dieser HTML-Code definiert das Aussehen eures PDFs.
// tcpdf unterstützt recht viele HTML-Befehle. Die Nutzung von CSS ist allerdings
// stark eingeschränkt.
 
$html = '
<table cellpadding="5" cellspacing="0" style="width: 100%; ">
 <tr>
 <td>'.nl2br(trim($rechnungs_header)).'</td>
    <td style="text-align: right">
Rechnungsnummer '.$rechnungs_nummer.'<br>
Rechnungsdatum: '.$rechnungs_datum.'<br>
 </td>
 </tr>
 
 <tr>
 <td style="font-size:1.3em; font-weight: bold;">
<br><br>
Rechnung
<br>
 </td>
 </tr>
 
 
 <tr>
 <td colspan="2">'.nl2br(trim($rechnungs_empfaenger)).'</td>
 </tr>
</table>
<br><br><br>
 
<table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">
 <tr style="background-color: #343a40; color: #ffffff; padding:5px;">
 <td style="padding:5px;"><b>Bezeichnung</b></td>
 <td style="text-align: center;"><b>Menge</b></td>
 <td style="text-align: center;"><b>Einzelpreis</b></td>
 <td style="text-align: center;"><b>Preis</b></td>
 </tr>';
 
 
$gesamtpreis = 0;
 
foreach($rechnungs_posten as $posten) {
 $menge = $posten[1];
 $einzelpreis = $posten[2];
 $preis = $menge*$einzelpreis;
 $gesamtpreis += $preis;
 $html .= '<tr>
            <td>'.$posten[0].'</td>
            <td style="text-align: center;">'.$posten[1].'</td> 
            <td style="text-align: right;">&euro; '.number_format($posten[2], 2, ',', '').'</td>	
            <td style="text-align: right;">&euro; '.number_format($preis, 2, ',', '').'</td>
            </tr>';
}
$html .="</table>";
 
 
 
$html .= '
<hr>
<table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">';
if($umsatzsteuer > 0) {
 //$netto = $gesamtpreis / (1+$umsatzsteuer);
 //$umsatzsteuer_betrag = $gesamtpreis - $netto;

 // netto und brutto geändert. vorlage war db = brutto. bei uns jedoch netto
 $netto = $gesamtpreis;
 $umsatzsteuer_betrag = ($netto * (1+$umsatzsteuer) - $netto);
 $brutto = $gesamtpreis + $umsatzsteuer_betrag;
 
 $html .= '
 <tr>
 <td colspan="3">Zwischensumme (Netto)</td>
 <td style="text-align: right;">&euro; '.number_format($netto , 2, ',', '').'</td>
 </tr>
 <tr>
 <td colspan="3">Umsatzsteuer ('.intval($umsatzsteuer*100).'%)</td>
 <td style="text-align: right;">&euro; '.number_format($umsatzsteuer_betrag, 2, ',', '').'</td>
 </tr>';
}
 
$html .='
            <tr>
                <td colspan="3"><b>Gesamtsumme: </b></td>
                <td style="text-align: right;"><b>&euro; '.number_format($brutto, 2, ',', '').'</b></td>
            </tr> 
        </table>
<br><br><br>';
 
if($umsatzsteuer == 0) {
 $html .= 'Nach § 19 Abs. 1 UStG wird keine Umsatzsteuer berechnet.<br><br>';
}
 
$html .= nl2br($rechnungs_footer);
 
 
 
//////////////////////////// Erzeugung eures PDF Dokuments \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
 
// TCPDF Library laden
require_once('tcpdf/tcpdf.php');
 
// Erstellung des PDF Dokuments
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
// Dokumenteninformationen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($pdfAuthor);
$pdf->SetTitle('Rechnung '.$rechnungs_nummer);
$pdf->SetSubject('Rechnung '.$rechnungs_nummer);
 
 
// Header und Footer Informationen
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// Auswahl des Font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// Auswahl der MArgins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// Automatisches Autobreak der Seiten
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
// Image Scale 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
// Schriftart
$pdf->SetFont('dejavusans', '', 10);
 
// Neue Seite
$pdf->AddPage();
 
// Fügt den HTML Code in das PDF Dokument ein
$pdf->writeHTML($html, true, false, true, false, '');
 
//Ausgabe der PDF
 
//Variante 1: PDF direkt an den Benutzer senden:
//$pdf->Output($pdfName, 'I');
 
//Variante 2: PDF im Verzeichnis abspeichern:
$pdf->Output(dirname(__FILE__).'/invoices/'.$pdfName, 'F');
//echo 'PDF herunterladen: <a href="' . 'invoices/' .$pdfName.'">'.$pdfName.'</a>';
 
//$pdf->Output(dirname(__FILE__).'/'.$pdfName, 'F');
//echo 'PDF herunterladen: <a href="'.$pdfName.'">'.$pdfName.'</a>';

// $url = 'invoices/' . $pdfName;  # pdf direkt nach erstellung aufrufen
header("Refresh: 0; url=contract_list.php");

?>



<!-- </body> from footer.php -->

<?php include('footer.php') ?>