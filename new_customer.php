<?php include('base.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ANANAS KFZ-BUDE</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<br />

<div class="container">

    <a class="btn btn-dark btn-sm" href="kunden.php">Zu den Kunden</a>
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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>