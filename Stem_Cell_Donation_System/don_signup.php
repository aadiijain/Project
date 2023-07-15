<?php
    session_start();
    require "config.php";
    // $insert=false;
    // $not_insert=true;
    // by default, error messages are empty
    $submitErr=$fnameErr=$lnameErr=$dobErr=$genErr=$mobErr=$bgroupErr=$dErr=$cErr=$hErr=$nErr=$addErr=$emailErr=$passErr=$cpassErr='';
    $email=$password=$mobilenum=$address='';
    if ($_SERVER['REQUEST_METHOD']=="POST"){        
      $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
      $minEightPassword = "/.{8,}/";
      if(empty($_POST['FName'])){
        $fnameErr="Please enter your first name!";
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $fname = $_POST['FName'];
      }
      if(empty($_POST['LName'])){
        $lnameErr="Please enter your last name!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $lname = $_POST['LName'];
      }

      if(empty($_POST['DOB'])){
        $dobErr="Please enter your date of birth!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $dob = $_POST['DOB'];
      }

      if(empty($_POST['Gender'])){
        $genErr="Please select your gender!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $gender = $_POST['Gender'];
      }

      if(empty($_POST['BGroup'])){
        $bgroupErr="Please enter your blood group!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $bgroup = $_POST['BGroup'];
      }

      if(empty($_POST['Diab'])){
        $dErr="Please select an option!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $diab = $_POST['Diab'];
      }

      if(empty($_POST['Cancer'])){
        $cErr="Please select an option!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $cancer = $_POST['Cancer'];
      }

      if(empty($_POST['HIV'])){
        $hErr="Please select an option!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $hiv = $_POST['HIV'];
      }

      if(empty($_POST['Nerv'])){
        $nErr="Please select an option!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $nerv = $_POST['Nerv'];
      }

      if(empty($_POST['Address'])){
        $addErr="Please enter your address!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $address = $_POST['Address'];
      }

      if(empty($_POST['MobileNum'])){
        $mobErr="Please enter your mobile number!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else{
        $mobilenum = $_POST['MobileNum'];
      }      

      //Email Address Validation
      if(empty($_POST['Email'])){
        $emailErr="Email is Required!";
        // exit;
        // echo "<script>alert('Email is Required')</script>"; 
      }
      else {
        $email = $_POST['Email'];
        if (!preg_match($validEmail,$email)){
        // echo "<script>alert('Invalid Email Address')</script>";
        $emailErr="Invalid Email Address!";
        // exit;
      }}

      // password validation 
      if(empty($_POST['Password'])){
        $passErr="Password is Required!"; 
        // exit;
        // echo "<script>alert('Password is Required')</script>";
      } 
      else{
        $password = $_POST['Password'];
        if(!preg_match($minEightPassword,$password)) {
        $passErr="Password must be at least 8 characters!";
        // exit;
        // echo "<script>alert('Password must be at least 8 characters')</script>";
      }}

      // form validation for confirm password
      $cpassword =$_POST['Confirm_Password']; 
      if($cpassword!=$password){
        $cpassErr="Passwords don't match!";
        // exit;
        // echo "<script>alert('Passwords don't match!')</script>";
      }

      // check all fields are valid or not
      if(empty($fnameErr) && empty($lnameErr) && empty($dobErr) && empty($genErr) && empty($mobErr) && empty($bgroupErr) && empty($dErr) && empty($cErr) && empty($hErr) && empty($nErr) && empty($addErr) && empty($emailErr) && empty($passErr) && empty($cpassErr))
      {
        if($diab==="N"&&$cancer==="N"&&$hiv==="N"&&$nerv==="N"){
          $sql = "INSERT INTO `stemcell_db`.`donor`(`First_Name`, `Last_Name`, `DOB`, `Gender`, `Email_id`, `Mobile_num`, `Address`, `Password`,`Blood_group`, `Stem_type_D`, `Diabetes`, `Cancer`, `HIV_Hepatitis`, `Nervous_sys_disorder`) VALUES ('$fname','$lname','$dob','$gender','$email','$mobilenum','$address','$password','$bgroup',NULL,'$diab','$cancer','$hiv','$nerv')";

        if($conn->query($sql)==true){
          // echo "Inserted!";
          //$insert=true;
          //$not_insert=false;
          header("Location:donoroptions.php");
        } 
        else{
          echo "Wrong!";
        }   
        }

        else{
          $submitErr="You are not eligible for donating stem cells!";
        }
         
        
      }
     
    }
    $conn->close();
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