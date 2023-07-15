<?php
include "config.php";
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $date=$_POST['dateappt'];
    $type=$_POST['scdtype'];
    // $user = $_SESSION['stemcell_db.recipient'];
    $user_id = $_SESSION['Recp_ID'];
    // $user_id = $_SESSION['Recp_ID'];
    $sql = "INSERT INTO `stemcell_db`.`appointment` (`apnt_id`, `apntDate`, `Recp_ID`, `Don_ID`) VALUES ('2', '$date', '$user_id', NULL);";
    if($conn->query($sql)==true){
        // echo "Inserted!";
        //$insert=true;
        //$not_insert=false;
        header("Location:finalpage.php");
      } 
      else{
        header("Location:finalpage.php");
      }   
      $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Appointment(Recipient)
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
        <form method="post" action="">
            <center><p style="font-size: 45px;">Book an Appointment</p></center>
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
                <a href="finalpage.php">
                <input type="submit" value="Book" style="background-color: rgb(31,24,135); color:white; border-radius: 20px; padding: 15px; text-align: center;font-size: 16px; margin: 4px 15px; cursor: pointer; display: inline-block; width: 100px; height: 55px; border-color: rgb(31, 24, 135);">
            </a>
            </p>
            </form>
        </div>
    </body>
</html>