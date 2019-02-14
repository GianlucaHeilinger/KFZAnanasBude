<?php include('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php

$sql ="SELECT * FROM `teile`";

$result = $pdo->query($sql);

echo "<a class='btn btn-dark btn-sm ml-2' href='new_part.php'>Neues Teil</a> <br /><br />";
   


echo "<table class='table table-striped table-hover ml-2 mr-2'>"; 
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th>Teile Nr.</th>";
echo "<th>Bezeichnung</th>";
echo "<th>Preis</th>";
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
?>


<!-- </body> from footer.php -->

<?php include('footer.php') ?>