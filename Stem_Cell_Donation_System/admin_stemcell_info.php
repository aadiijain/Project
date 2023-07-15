<?php 

include "config.php";

$sql = "SELECT * FROM `stemcell_db`.`stem_cell`";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Stem Cell Information</h2>

<table class="table">

    <thead>

        <tr>

        <!-- <th>ID</th> -->

        <th>Stem Type</th>
        <th>Quantity</th>
        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['Stem_type']; ?></td>

                    <td><?php echo $row['Qty'];?></td>


                    <td><a class="btn btn-danger" href="admin_stemcell_info_delete.php?id=<?php echo $row['Stem_type']; ?>">Delete</a></td> -->

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>