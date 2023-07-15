<?php 

include "config.php";

$sql = "SELECT * FROM `stemcell_db`.`donor`";

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

        <h2>Donor Information</h2>

<table class="table">

    <thead>

        <tr>

        <!-- <th>ID</th> -->

        <th>ID</th>
        <th>Name</th>

        <th>DOB</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Address</th>
        <th>Blood Group</th>
        <!-- <th>Stem Cell Type</th> -->
        <th>Diabetes</th>
        <th>Cancer</th>
        <th>HIV_Hepatitis</th>
        <th>Nervous System Disorder</th>       

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['Don_ID']; ?></td>

                    <td><?php echo $row['First_Name']." ".$row['Last_Name']; ?></td>

                    <td><?php echo $row['DOB']; ?></td>

                    <td><?php echo $row['Gender']; ?></td>

                    <td><?php echo $row['Email_id']; ?></td>
                    <td><?php echo $row['Mobile_num']; ?></td>
                    <td><?php echo $row['Address'] ?></td>
                    <td><?php echo $row['Blood_group']; ?></td>
                    <!-- <td><?php echo $row['Stem_type_D']; ?></td> -->
                    <td><?php echo $row['Diabetes']; ?></td>
                    <td><?php echo $row['Cancer']; ?></td>
                    <td><?php echo $row['HIV_Hepatitis']; ?></td>
                    <td><?php echo $row['Nervous_sys_disorder']; ?></td>

                    <td><a class="btn btn-danger" href="admin_don_info_delete.php?id=<?php echo $row['Don_ID']; ?>">Delete</a></td> -->

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>