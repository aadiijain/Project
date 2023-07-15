<?php 
session_start();
require "config.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $fname = $_POST['FName'];
    $lname = $_POST['LName'];
    $dob = $_POST['DOB'];
    $gender = $_POST['Gender'];
    $bgroup = $_POST['BGroup'];
    $diab = $_POST['Diab'];
    $cancer = $_POST['Cancer'];
    $hiv = $_POST['HIV'];
    $nerv = $_POST['Nerv'];
    $address = $_POST['Address'];
    $password = $_POST['Password'];
    $mobilenum = $_POST['MobileNum'];
    $email = $_POST['Email'];

    $sql = "UPDATE `stemcell_db`.`donor` SET `First_Name`='$fname',`Last_Name`='$lname',`DOB`='$dob',`Gender`='$gender',`Email_id`='$email',`Mobile_num`='$mobilenum',`Address`='$address',`Blood_group`='$bgroup',`Stem_type_D`='NULL',`Diabetes`='$diab',`Cancer`='$cancer',`HIV_Hepatitis`='$hiv',`Nervous_sys_disorder`='$nerv',`Password``='$password' WHERE `Email_id` = '$email'";
    $result = $conn->query($sql); 
    // if ($result == TRUE) {
    //     echo "Record updated successfully.";
    // }
    // else{
    //     echo "Error:" . $sql . "<br>" . $conn->error;
    // }
    header("Location:donoroptions.php");
} 

if (isset($_GET['email'])) {

    $usr_email = $_GET['email']; 

    $sql = "SELECT * FROM `stemcell_db`.`donor` WHERE `Email_id`='$usr_email'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $fname = $row['First_Name'];
            $lname = $row['Last_Name'];
            $dob = $row['DOB'];
            $gender = $row['Gender'];
            $bgroup = $row['Blood_group'];
            $diab = $row['Diabetes'];
            $cancer = $row['Cancer'];
            $hiv = $row['HIV_Hepatitis'];
            $nerv = $row['Nervous_sys_disorder'];
            $address = $row['Address'];
            $mobilenum = $row['Mobile_num'];
            $email = $row['Email_id'];
            $password = $row['Password'];

        } 
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Donor(Signup)
        </title>
        <link rel="stylesheet" href="style1.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <h1>Stem Cells Bank</h1>
        <h2 style="margin-left :60px;">
            <a href="homepage.php">
                <button class="button button2">Home</button>
            </a>
            <a href="don_login.php">
                <button class="button button2">Back</button>
            </a>
        </h2>
        
            <div class="dsignupform">
                <center><p style="font-size: 45px;">Please Signup/Update(Donor)</p></center>
                <form style="margin-left:50px ;" action="" method="post"> 
                    <p>First Name:<input type="text"   name="FName"> <!--<?php if(isset($fnameErr)){echo $fnameErr;} ?>--><span class="error" style="color: red;"> <?php echo $fnameErr;?></span></p>
                    
                    <p>Last Name:<input type="text"   name="LName"> <!--<?php if(isset($lnameErr)){echo $lnameErr;} ?>--><span class="error" style="color: red;"> <?php echo $lnameErr;?></span></p>
                    
                    <p>Date Of Birth:<input type="text"  name="DOB"><span class="error" style="color: red;"> <?php echo $dobErr;?></span></p>
                    
                    <p>Gender:&nbsp;&nbsp;
                        <input type="radio" name="Gender" value="M">Male&nbsp;&nbsp;
                        <input type="radio" name="Gender" value="F">Female&nbsp;&nbsp;<input type="radio" name="Gender"value="O">Others
                        <span class="error" style="color: red;"> <?php echo $genErr;?></span>
                    </p>
                    
                    <p>
                        Blood Group:<input type="text"  name="BGroup"> <!--<?php if(isset($bgroupErr)){echo $bgroupErr;} ?>-->
                         <span class="error" style="color: red;"> <?php echo $bgroupErr;?></span>
                    </p>
                    
                    <p>
                        Diabetes:&nbsp;&nbsp;
                        <input type="radio" name="Diab" value="Y">Yes&nbsp;&nbsp;
                        <input type="radio" name="Diab" value="N">No&nbsp;&nbsp;
                     <!--<?php if(isset($dErr)){echo $dErr;} ?>--><span class="error" style="color: red;"> <?php echo $dErr;?></span></p>
                    
                    <p>
                      Cancer:&nbsp;&nbsp;
                        <input type="radio" name="Cancer" value="Y">Yes&nbsp;&nbsp;
                        <input type="radio" name="Cancer" value="N">No&nbsp;&nbsp;
                     <!--<?php if(isset($cErr)){echo $cErr;} ?>--><span class="error" style="color: red;"> <?php echo $cErr;?></span></p>
                    
                    <p>
                        HIV:&nbsp;&nbsp;
                        <input type="radio" name="HIV" value="Y">Yes&nbsp;&nbsp;
                        <input type="radio" name="HIV" value="N">No&nbsp;&nbsp;
                     <!--<?php if(isset($hErr)){echo $hErr;} ?>--><span class="error" style="color: red;"> <?php echo $hErr;?></span></p>
                    
                    <p>
                        Nervous System Disorder&nbsp;&nbsp;
                        <input type="radio" name="Nerv" value="Y">Yes&nbsp;&nbsp;
                        <input type="radio" name="Nerv" value="N">No&nbsp;&nbsp;
                     <!--<?php if(isset($nErr)){echo $nErr;} ?>--><span class="error" style="color: red;"> <?php echo $nErr;?></span></p>
                    
                    <p>
                        Address:<input type="text"  name="Address"> <!--<?php if(isset($addErr)){echo $addErr;} ?>-->
                        <span class="error" style="color: red;"> <?php echo $addErr;?></span>
                    </p>
                    
                    <p>
                        Contact Number:<input type="number"  name="MobileNum">
                        <span class="error" style="color: red;"> <?php echo $mobErr;?></span>
                    </p>
                    
                    <p>
                        EMail:<input type="email"  name="Email"> <!--<?php if(isset($emailErr)){echo $emailErr;} ?><?php if(isset($email1Err)){echo $email1Err;} ?>-->
                        <span class="error" style="color: red;"> <?php echo $emailErr;?></span>
                    </p>
                    
                    <p>
                        Password:<input type="password" name="Password"> <!--<?php if(isset($passErr)){echo $passErr;} ?>-->
                        <span class="error" style="color: red;"> <?php echo $passErr;?></span>
                    </p>
                    
                    <p>
                        Confirm Password:<input type="password" name="Confirm_Password"> <!--<?php if(isset($pass1Err)){echo$pass1Err;} ?>-->
                        <span class="error" style="color: red;"> <?php echo $cpassErr;?></span>
                    </p>
                    
                    <p>
                    <span class="error" style="color: red;"> <?php echo $submitErr;?></span>    
                    <a href="donoroptions.php">
                        <input type="submit" value="Submit" style="background-color: rgb(31,24,135); color:white; border-radius: 20px; padding: 15px; text-align: center;font-size: 16px; margin: 4px 15px; cursor: pointer; display: inline-block; width: 100px; height: 55px; border-color: rgb(31, 24, 135);">
                    </a>
                    </p>
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>