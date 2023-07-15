<?php
session_start();
require "config.php";
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST['Email'];
    $password=$_POST['Password'];

    $query = "SELECT * FROM `stemcell_db`.`donor` WHERE `Email_id`='$email'";
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    // $result = mysqli_query($db,$sql);
    $count=mysqli_num_rows($result);
    if($count){
        $email_password = mysqli_fetch_assoc($result);
        $pwd = $email_password['Password'];
        // echo "<script>alert('$pwd')</script>";
        // $pass_decode = password_verify($password,$pwd);
        if($pwd == $password){
            $_SESSION["usr_email"] = $email;
            header("Location:donoroptions.php");
            echo "<script>alert('Logged in Successfully!')</script>";
            
        }
        else{
            echo "<script>alert('Email or password is incorrect!')</script>";
        }
        
    }
    else{
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Login(Donor)
        </title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <h1>Stem Cells Bank</h1>
        <h2 style="margin-left :60px;">
            <a href="homepage.php">
                <button class="button button2">Home</button>
            </a>
            <a href="mainlogin.php">
                <button class="button button2">Back</button>
            </a>
        </h2>
        <center>
        <div class="dloginform">
            <p style="font-size: 45px;">Please Login(Donor)</p>
            <form style="margin-left: 50px;" action="" method="post">
                <p>Email:
                    <input type="email" required name="Email" >
                </p>
                <p>Password:
                    <input type="password" required name="Password" >
                </p>
                <p>
                    <a href="donoroptions.php">
                        <input type="submit" value="Login" style="background-color: rgb(31,24,135); color:white; border-radius: 20px; padding: 15px; text-align: center;font-size: 16px; margin: 4px 15px; cursor: pointer; display: inline-block; width: 100px; height: 55px; border-color: rgb(31, 24, 135);">
                    </a>
                </p>
            </form>
        </div>
        <p>Don't have an account?<a href="don_signup.php"> Click Here</a></p>
        <br><br><br>
        </center>
    </body>
</html>