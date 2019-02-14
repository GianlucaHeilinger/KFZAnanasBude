<?php include('connection.php') ?>
<?php include('header.php') ?>
<?php // $kundennummer = $_GET['kundennummer']; ?>

<!-- <body> from header.php -->

<br />

<div class="container">

    <a class="btn btn-dark btn-sm" href="customer.php">Zu den Kunden</a>
    <br /><br />
    

    <form action="save_car.php" method="get">
        <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Neues Fahrzeug</th>
                <th></th>
            </tr>
        </thead>
            <tr>
                <td>
                    <label for="kunde">Kunde</label>
                </td>
                <td>
                    <input type="text" name="Kunde">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="marke">Marke</label>
                </td>
                <td>
                    <input type="text" name="marke">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="type">Type</label>
                </td>
                <td>
                    <input type="text" name="type">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kennzeichen">Kennzeichen</label>
                </td>
                <td>
                    <input type="text" name="kennzeichen">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fahrgestellnummer">Fahrgestellnummer</label>
                </td>
                <td>
                    <input type="text" name="fahrgestellnummer">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nationalcode">Nationalcode</label>
                </td>
                <td>
                    <input type="text" name="nationalcode">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="motorkennzeichen">Motorkennzeichen</label>
                </td>
                <td><input type="text" name="motorkennzeichen">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="getriebekennzeichen">Getriebekennzeichen</label>
                </td>
                <td>
                    <input type="text" name="getriebekennzeichen">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="farbe">Farbe</label>
                </td>
                <td>
                    <input type="text" name="farbe">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="treibstoff">Treibstoff</label>
                </td>
                <td>
                    <input type="text" name="treibstoff">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="leistung">Leistung</label>
                </td>
                <td>
                    <input type="number" name="leistung">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="hubraum">Hubraume</label>
                </td>
                <td>
                    <input type="number" name="hubraum">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="erstzulassung">Erstzulassung</label>
                </td>
                <td>
                    <input type="date" name="erstzulassung">
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