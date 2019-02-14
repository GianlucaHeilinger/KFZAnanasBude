<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<br />

<div class="container">

    <a class="btn btn-dark btn-sm" href="customer.php">Zu den Kunden</a>
    <br /><br />
    

    <form action="save_customer.php" method="get">
        <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Neuer Eintrag</th>
                <th></th>
            </tr>
        </thead>
            
            <tr>
                <td>
                    <label for="anrede">Anrede</label>
                </td>
                <td>
                    <input type="text" name="anrede">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="titel">Titel</label>
                </td>
                <td>
                    <input type="text" name="titel">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="vorname">Vorname</label>
                </td>
                <td>
                    <input type="text" name="vorname">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nachname">Nachname</label>
                </td>
                <td>
                    <input type="text" name="nachname">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="gebdat">Geburtsdatum</label>
                </td>
                <td>
                    <input type="date" name="gebdat">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="strasse">Strasse</label>
                </td>
                <td><input type="text" name="strasse">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="plz">PLZ</label>
                </td>
                <td>
                    <input type="number" name="plz">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ort">Ort</label>
                </td>
                <td>
                    <input type="text" name="ort">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="telefon">Telefon</label>
                </td>
                <td>
                    <input type="text" name="telefon">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">EMail</label>
                </td>
                <td>
                    <input type="text" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="newsletter">Newsletter</label>
                </td>
                <td>
                    <input type="checkbox" name="newsletter">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kommentar">Kommentar</label>
                </td>
                <td>
                    <input type="text" name="kommentar">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kundeseit">Kunde seit</label>
                </td>
                <td>
                    <input type="date" name="kundeseit">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="submit"></label>
                </td>
                <td>
                    <input type="submit" name="submit" value="Speichern" class="btn btn-dark">
                </td>
            </tr>
        </table>
    </form> 

</div>


<!-- </body> from footer.php -->

<?php include('footer.php') ?>