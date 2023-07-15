<?php
session_start();
require "config.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
   
    $query= "SELECT * FROM `stemcell_db`.`donor` WHERE `Email_id` = '".$_SESSION['usr_email']."';";
    $result=$conn->query($query) or die(mysqli_error($conn));
    
    // $arr = mysqli_fetch_assoc($result);
    // $num = mysqli_num_rows($result); //this will count the rows (if exists)
    if(mysqli_num_rows($result) > 0){
        // $row = $result->fetch_assoc();
        $row = mysqli_fetch_assoc($result);
        $date=$_POST['dateappt'];
        $type=$_POST['scdtype'];
        $usr_id=$row['Don_ID'];
        $sql= "INSERT INTO `stemcell_db`.`appointment`(`apntDate`, `Recp_ID`, `Don_ID`) VALUES ('$date','NULL','$usr_id');";
    }
    if($conn->query($sql)==true){
        // echo "Inserted!";
        //$insert=true;
        //$not_insert=false;
        header("Location:finalpage.php");
      } 
      else{
        echo die(mysqli_error($conn));
      }    
      
    }
  $conn->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Appointment(donor)
        </title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <h1>Stem Cell Bank</h1>
        <h2 style="margin-left: 60px;">
            <a href="homepage.php">
                <button class="button button2">Home</button>
            </a>
        </h2>
        <div class="apptform" style="margin-left: 55px;">
            <center><p style="font-size: 45px;">Book an Appointment</p></center>
            <form style="margin-left: 50px;" action="" method="post">
            <p>
                Date:<input type="text" name="dateappt">
            </p>
            <p>
                Type of Stem Cell:
                <select name="scdtype">
                    <option value="Cancer" name="cancer">Cancer</option>
                    <option value="Hematopoietic" name="hematopoietic">Hematopoietic</option>
                    <option value="Mesenchymal" name="mesenchymal">Mesenchymal</option>
                    <option value="Epithelial" name="epithelial">Epithelial</option>
                </select>
            </p>
            <p>
                <!--<a href="finalpage.php">-->
                <input type="submit" value="Book" style="background-color: rgb(31,24,135); color:white; border-radius: 20px; padding: 15px; text-align: center;font-size: 16px; margin: 4px 15px; cursor: pointer; display: inline-block; width: 100px; height: 55px; border-color: rgb(31, 24, 135);">
                </a>
            </p>
</form>
        </div>
    </body>
</html>