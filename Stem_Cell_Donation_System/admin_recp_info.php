<?php 

include "config.php";

$sql = "SELECT * FROM `stemcell_db`.`recipient`";

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

        <h2>Recipient Information</h2>

<table class="table">

    <thead>

        <tr>

        <!-- <th>ID</th> -->

        <th>ID</th>

        <th>Email</th>
        <th>Mobile Number</th>
        <th>Address</th>
        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['Recp_ID']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['MobileNum']; ?></td>
                    <td><?php echo $row['Address'] ?></td>
                    <td><a class="btn btn-danger" href="admin_recp_info_delete.php?id=<?php echo $row['Recp_ID']; ?>">Delete</a></td> -->

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>