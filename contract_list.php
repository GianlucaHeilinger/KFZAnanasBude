<?php include_once('connection.php') ?>
<?php include('header.php') ?>

<!-- <body> from header.php -->

<?php
$sql ="SELECT * FROM `reparatur`";

$result = $pdo->query($sql);

echo" <button type='button' class='btn btn-dark btn-new-car mb-3 mb-lg-0' data-toggle='modal' data-target='#contractnewmodal'>Neues Teil</button><br /><hr />";

// echo "<a class='btn btn-dark btn-sm ml-2' href='part_new.php'>Neues Teil</a> <br /><br />";

echo "<table id='contracttable' class='display table table-hover'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th>Reparatur ID</th>";
echo "<th>Fahrzeug ID</th>";
echo "<th>Datum</th>";
echo "<th><center>Editieren</center></th>";
echo "<th><center>Löschen</center></th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// output data of each row
while($row = $result->fetch())
{
    $sql2 ="SELECT * FROM `fahrzeug` WHERE `fzid`=".$row['fzid'];

    $result2 = $pdo->query($sql2);    
   
    while($row2 = $result2->fetch())
    {
        $kundenid=$row2['kundeid'];
    }

    echo "<tr href='contract_edit.php?repid=" . $row['repid']."'>";
    echo "<td>".$row["repid"]."</td>";

    if(isset($kundenid))
    {
        echo "<td><a href='customer_detail.php?kundennummer=" . $kundenid."'>".$row["fzid"]."</a></td>";
    }
    else
    {
        echo "<td>".$row["fzid"]."</td>";
    }

    echo "<td>".$row["datum"]."</td>";
    echo "<td><a data-toggle='modal' data-target='#contractupdatemodal" . $row["repid"]."' name='id'><center><i class='fas fa-file-invoice'></i></center></a></td>";
    echo "<td><a href='contract_delete.php?repid=".$row['repid']."'><center><i class='far fa-trash-alt'></i></center></a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>

<?php include('footer.php') ?>