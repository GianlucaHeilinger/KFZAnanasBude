<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php

$sql ="SELECT * FROM `teile`";

$result = $pdo->query($sql);

echo "<table>"; 
echo "<thead>";
echo "<tr>";
echo "<td>Teile ID</td>";
echo "<td>Bezeichnung</td>";
echo "<td>Preis</td>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// output data of each row
while($row = $result->fetch()) 
{
    echo "<tr>";
    echo "<td>".$row["teileid"]."</td>";
    echo "<td>".$row["bezeichnung"]."</td>";
    echo "<td>".$row["preis"]."</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";   

echo "<form action='new_part.php' method='get'>";
echo "<input type='submit' value='Neues Teil' />";
echo "</form>";
?>


<!-- </body> from footer.php -->

<?php include('footer.php') ?>