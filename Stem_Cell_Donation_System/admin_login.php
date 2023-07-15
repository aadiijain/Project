<?php
session_start();
require "config.php";
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST['Email'];
    $password=$_POST['Password'];

    $query = "SELECT * FROM `stemcell_db`.`admin` WHERE `Email`='$email';";
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    // $result = mysqli_query($db,$sql);
    $count=mysqli_num_rows($result);
    if($count){
        $email_password = mysqli_fetch_assoc($result);
        $pwd = $email_password['Password'];
        // echo "<script>alert('$pwd')</script>";
        // $pass_decode = password_verify($password,$pwd);
        if($pwd == $password){
           
            header("Location:adminhome.php");
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
        Stem Cell(Admin)
    </title>
    <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <h1>Stem Cell Bank</h1>
        <center>
            <br><br>
            <h2>Admin Login</h2>
            <div class="adminloginform">
                <form action="" method="post">
                    <p>
                        Email:<input type="email" required name="Email">
                    </p>
                    <p>
                        Password:<input type="password" required name="Password">
                    </p>
                    <p>
                        <a href="adminhome.html">
                            <input type="submit" value="Login" style="background-color: rgb(31,24,135); color:white; border-radius: 20px; padding: 15px; text-align: center;font-size: 16px; margin: 4px 15px; cursor: pointer; display: inline-block; width: 100px; height: 55px; border-color: rgb(31, 24, 135);">
                        </a>
                    </p>
                </form>
            </div>
            <br><br><br>
        </center>
    </body>
</html>