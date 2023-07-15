<?php 
session_start();
require "config.php";
$mobErr=$addErr=$emailErr=$passErr=$cpassErr='';
$email=$password=$mobilenum=$address='';
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
      // $uppercasePassword = "/(?=.*?[A-Z])/";
      // $lowercasePassword = "/(?=.*?[a-z])/";
      // $digitPassword = "/(?=.*?[0-9])/";
      // $spacesPassword = "/^$|\s+/";
      // $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
      $minEightPassword = "/.{8,}/";
      if(empty($_POST['Address'])){
        $addErr="Please enter your address!"; 
        // echo "<script>alert('Email is Required')</script>"; 
        // echo "<p>Email is Required</p>";
      }
      else{
        $address = $_POST['Address'];
      }
      if(empty($_POST['MobileNum'])){
        $mobErr="Please enter your mobile number!"; 
        // echo "<script>alert('Email is Required')</script>"; 
        // echo "<p>Email is Required</p>";
      }
      else{
        $mobilenum = $_POST['MobileNum'];
      }
      //Email Address Validation
      if(empty($_POST['Email'])){
        $emailErr="Email is Required!"; 
        // echo "<script>alert('Email is Required')</script>"; 
        // echo "<p>Email is Required</p>";
      }
      else {
        $email = $_POST['Email'];
      if (!preg_match($validEmail,$email)) {
        $emailErr="Invalid Email Address!";
        // echo "<script>alert('Invalid Email Address')</script>";
        // echo"<p>Invalid Email Address</p>";
      }}
      // else{
      //   $email = $_POST['Email'];
      // }
      // password validation 
      if(empty($_POST['Password'])){
        $passErr="Password is Required!"; 
        // echo "<script>alert('Password is Required')</script>";
        // echo"<p>Password is Required</p>"; 
      } 
      else{
        $password = $_POST['Password'];
      if (!preg_match($minEightPassword,$password)) {
        $passErr="Password must be at least 8 characters!";
        // echo "<script>alert('Password must be at least 8 characters')</script>";
        // echo "<p>Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length</p>";

      }}
      // else{
      // }

      // form validation for confirm password
      // $password = $_POST['Password'];
      $cpassword =$_POST['Confirm_Password']; 
      if($cpassword!=$password){
        $cpassErr="Passwords don't match!";
        echo "<script>alert('Passwords don't match!')</script>";
        // echo "<p>Passwords don't match!</p>";
      }
      // else{
      //   $cpassErr=true;
      // }
      // check all fields are valid or not
      if(empty($mobErr) && empty($addErr) && empty($emailErr) && empty($passErr) && empty($cpassErr))
      {
    
    $sql = "UPDATE `stemcell_db`.`recipient` SET `Email`= '$email',`MobileNum`='$mobilenum',`Address`='$address',`Password`='$password',`Stem_type_R`='NULL' WHERE `Email` = '$email'";
    $result = $conn->query($sql); 
    // if ($result == TRUE) {
    //     echo "Record updated successfully.";
    // }
    // else{
    //     echo "Error:" . $sql . "<br>" . $conn->error;
    // }
    header("Location:recoptions.php");
} }

if (isset($_GET['Email'])) {

    $user_email = $_GET['Email']; 

    $sql = "SELECT * FROM `stemcell_db`.`recipient` WHERE `Email`='$user_email'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $_SESSION['Recp_ID']=$row['Recp_ID'];
            $address = $row['Address'];
            $password = $row['Password'];
            $mobilenum = $row['MobileNum'];
            $email = $row['Email'];
            // $first_name = $row['firstname'];

        } 
    }
    header("Location:recoptions.php");
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Recipient(Signup)
        </title>
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1>Stem Cells Bank</h1>
        <h2 style="margin-left :60px;">
            <a href="homepage.php">
                <button class="button button2">Home</button>
            </a>
            <a href="recp_login.php">
                <button class="button button2">Back</button>
            </a>
        </h2>
        <div class="recsignupform">
            <center><p style="font-size: 45px;">Please Signup/Update(Recipient)</p></center>
            <form style="margin-left: 50px;" action="" method="post">
                <p>Address:
                    <input type="text"  name="Address"><span class="error" style="color: red;"> <?php echo $addErr;?></span>
                </p>
                <p>
                    Mobile Number:
                    <input type="number"  name="MobileNum"><span class="error" style="color: red;"> <?php echo $mobErr;?></span>
                </p>
                <p>
                    Email:
                    <input type="email"  name="Email"><span class="error" style="color: red;"> <?php echo $emailErr;?></span>
                </p>
                <p>
                    Password:
                    <input type="password"  name="Password"><span class="error" style="color: red;">  <?php echo $passErr;?></span>
                </p>
                <p>
                    Confirm Password:
                    <input type="password"  name="Confirm_Password"><span class="error" style="color: red;">  <?php echo $cpassErr;?></span>
                </p>
                <p>
                    <a href="recoptions.html">
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