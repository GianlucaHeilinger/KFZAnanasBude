<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

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


<!-- </body> from footer.php -->

<?php include('footer.php') ?>