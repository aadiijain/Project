<?php 

include "config.php";

$sql = "SELECT * FROM `stemcell_db`.`appointment`";

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

        <h2>Appointment Information</h2>

<table class="table">

    <thead>

        <tr>

        <!-- <th>ID</th> -->

        <th>ID</th>
        <th>Date</th>

        <th>Donor ID</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    if($row['Recp_ID']==NULL){

        ?>

                    <tr>

                    <td><?php echo $row['apnt_id']; ?></td>

                    <td><?php echo $row['apntDate']; ?></td>
                    <td><?php echo $row['Don_ID']; ?></td>
                    <!-- <td><?php echo $row['Nervous_sys_disorder']; ?></td> -->

                    <td><a class="btn btn-danger" href="admin_don_info_delete.php?id=<?php echo $row['Don_ID']; ?>">Delete</a></td> -->

                    </tr>                       

        <?php       }}

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>