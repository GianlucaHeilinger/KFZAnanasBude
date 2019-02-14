<?php include('connection.php') ?>
<?php include('header.php') ?>
<?php $kundennummer = $_GET['kundennummer']; ?>

<!-- <body> from header.php -->

<?php            
$query = "SELECT * from kunde WHERE kundennummer = '{$kundennummer};
?>

    <table class="table table-striped table-hover ml-2 mr-2">
            <tr>
                <td>Kd.Nr.</td>
                <td><?php $query['kundennummer']?></td>
            </tr>
        
    </table>


<!-- </body> from footer.php -->

<?php include('footer.php') ?>