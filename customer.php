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
<h5 class="ml-2">Super Awesome Kunden</h5><br />

<a class="btn btn-dark btn-sm ml-2" href="new_customer.php">Neuer Kunde</a>
    <br /><br />


    <table class="table table-striped table-hover ml-2 mr-2">
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
                
                <th>Edit</th>
                <th>Delete</th>
                <th>Detail</th>
                <th>Rechnungen</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            $sql = "SELECT * from kunde ORDER BY kundennummer ASC";

            foreach ($pdo->query($sql) as $row) {
                echo "<tr><td>" . $row['kundennummer'] . "</td>";
                echo "<td>" . $row['anrede'] . "</td>";
                echo "<td>" . $row['titel'] . "</td>";
                echo "<td>" . $row['vorname'] . "</td>";
                echo "<td>" . $row['nachname'] . "</td>";
                
                echo "<td>" . $row['strasse'] . "</td>";
                echo "<td>" . $row['plz'] . "</td>";
                echo "<td>" . $row['ort'] . "</td>";
                echo "<td>" . $row['telefon'] . "</td>";
               
                echo "<td><a class='badge badge-dark' href='edit.php?kundennummer=" . $row['kundennummer'] . "'>Edit</a></td>";
                echo "<td><a class='badge badge-dark' href='delete.php?kundennummer=" . $row['kundennummer'] . "'>Delete</a></td>";
                echo "<td><a class='badge badge-dark' href='detail.php?kundennummer=" . $row['kundennummer'] . "'>Detail</a></td>";
                echo "<td><a class='badge badge-dark' href='rechnungen.php?kundennummer=" . $row['kundennummer'] . "'>Rechnungen</a></td></tr>";
            } 

        ?>
        </tbody>
    </table>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>