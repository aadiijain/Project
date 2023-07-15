<?php
    require_once "config.php";
    // $insert=false;
    // $not_insert=true;
    // by default, error messages are empty
    $emailErr=$passErr=$cpassErr='';
    $email=$password=$mobilenum=$address='';
    if ($_SERVER['REQUEST_METHOD']=="POST"){        

      // $name = $_POST['Name'];
      // $dob = $_POST['dateofbirth'];
      // $gender = $_POST['gender'];
      // $bgroup = $_POST['blood_grp'];
      // $diab = $_POST['diabetes'];
      // $cancer = $_POST['cancer'];
      // $hiv = $_POST['HIV_hepatitis'];
      // $nerv = $_POST['nervous_sys_disorder'];
      // $address = $_POST['address'];
      // $password = $_POST['password_d'];
      // $mobilenum = $_POST['mobile_num'];
      // $email = $_POST['email_id'];
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
      $validEmail="/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/";
      // $uppercasePassword = "/(?=.*?[A-Z])/";
      // $lowercasePassword = "/(?=.*?[a-z])/";
      // $digitPassword = "/(?=.*?[0-9])/";
      // $spacesPassword = "/^$|\s+/";
      // $symbolPassword = "/(?=.?[#?!@$%^&-])/";
      $minEightPassword = "/.{8,}/";
      //Email Address Validation
      if(empty($email)){
        $emailErr="Email is Required";
        echo "<script>alert('Email is Required')</script>"; 
        // echo "<p>Email is Required</p>";
      }
      else if (!preg_match($validEmail,$email)) {
        echo "<script>alert('Invalid Email Address')</script>";
        $emailErr="Invalid Email Address";
        // echo"<p>Invalid Email Address</p>";
      }
      // else{
      //   $email = $_POST['Email'];
      // }
      // password validation 
      if(empty($password)){
        $passErr="Password is Required"; 
        echo "<script>alert('Password is Required')</script>";
        // echo"<p>Password is Required</p>"; 
      } 
      elseif (!preg_match($minEightPassword,$password)) {
        $passErr="Password must be at least 8 characters";
        echo "<script>alert('Password must be at least 8 characters')</script>";
        // echo "<p>Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length</p>";

      }
      // else{
      //   $password = $_POST['Password'];
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
      if(empty($emailErr) && empty($passErr) && empty($cpassErr))
      {
        // $id = 103;
        // $address = $_POST['Address'];
        // $password = $_POST['Password'];
        // $mobilenum = $_POST['MobileNum'];
        // $email = $_POST['Email'];
        // $stemtype_r = $_POST['Stem_type_R'];
        echo $fname;
        echo $diab;
        $id = uniqid();
        if($diab==="N"&&$cancer==="N"&&$hiv==="N"&&$nerv==="N"){
                $sql = "SELECT * FROM `stemcell_db`.`donor` WHERE 'Email_id' = '$email'";
                // $sql = "INSERT INTO `Stem_cell`.`donor`(`First_Name`, `Last_Name`, `DOB`, `Gender`, `Email_id`, `Mobile_num`, `Address`,`Blood_group`, `Stem_type_D`, `Diabetes`, `Cancer`, `HIV_Hepatitis`, `Nervous_sys_disorder`,`Password`) VALUES ('$fname','$lname','$dob','$gender','$email','$mobilenum','$address','$bgroup',NULL,'$diab','$cancer','$hiv','$nerv','$password')";
                //$sql = "INSERT INTO doner(`Don_id`,`name`, `dateofbirth`, `gender`, `email_id`, `mobile_num`, `address`,`blood_grp`, `stem_type_D`, `diabetes`, `cancer`, `HIV_hepatities`, `nervous_sys_disorder`,`password_d`) VALUES ('$id','$name','$dob','$gender','$email','$mobilenum','$address','$bgroup','m','$diab','$cancer','$hiv','$nerv','$password')";
                //echo $sql;
          if($conn->query($sql)==true){
              $sql = "UPDATE `stemcell_db`.`donor` SET `First_Name` = `$fname`,`Last_Name` = `$lname`, `DOB` = `$dob`, `Gender` = `$gender`, `Email_id` = `$email`, `Mobile_num` = `$mobilenum`, `Address` = `$address`, `Blood_group` = `$bgroup`, `Stem_type_D` = `m`, `Diabetes` = `$diab`, `Cancer` = `$cancer`, `HIV_Hepatitis` = `$hiv`, `Nervous_sys_disorder` = `$nerv`, `Password` = `$password` where `Email_id` = `$email`";
            
          }
          else {
              $sql = "INSERT INTO donor(`First_name`,`Last_name`, `DOB`, `Gender`, `Email_id`, `Mobile_num`, `Address`,`Blood_group`, `Stem_type_D`, `Diabetes`, `Cancer`, `HIV_Hepatitis`, `Nervous_sys_disorder`,`Password`) VALUES ('$fname','$lname','$dob','$gender','$email','$mobilenum','$address','$bgroup','m','$diab','$cancer','$hiv','$nerv','$password')";
              // echo $sql;
              if($conn->query($sql)==true){
                header("Location:donoroptions.php");
              }
          };    
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
                    <p>First Name:<input type="text" required  name="FName"></p> 
                    <p>Last Name:<input type="text" required  name="LName"></p> 
                    <p>Date Of Birth:<input type="text" required  name="DOB"></p>
                    <p>Gender:&nbsp;&nbsp;
                        <input type="radio" name="Gender" value="M">Male&nbsp;&nbsp;
                        <input type="radio" name="Gender" value="F">Female&nbsp;&nbsp;<input type="radio" name="Gender"value="O">Others
                    </p>
                    <p>
                        Blood Group:<input type="text" required name="BGroup">
                    </p>
                    <p>
                        Diabetes:&nbsp;&nbsp;
                        <input type="radio" name="Diab" value="Y">Yes&nbsp;&nbsp;
                        <input type="radio" name="Diab" value="N" checked=true>No&nbsp;&nbsp;

                    </p>
                    <p>
                        Cancer:&nbsp;&nbsp;
                        <input type="radio" name="Cancer" value="Y">Yes&nbsp;&nbsp;
                        <input type="radio" name="Cancer" value="N" checked=true>No&nbsp;&nbsp;

                    </p>
                    <p>
                        HIV:&nbsp;&nbsp;
                        <input type="radio" name="HIV" value="Y">Yes&nbsp;&nbsp;
                        <input type="radio" name="HIV" value="N" checked=true>No&nbsp;&nbsp;

                    </p>
                    <p>
                        Nervous System Disorder&nbsp;&nbsp;
                        <input type="radio" name="Nerv" value="Y">Yes&nbsp;&nbsp;
                        <input type="radio" name="Nerv" value="N" checked=true>No&nbsp;&nbsp;

                    </p>
                    <p>
                        Address:<input type="text" required name="Address">
                    </p>
                    <p>
                        Contact Number:<input type="number" required name="MobileNum">
                    </p>
                    <p>
                        EMail:<input type="email" required name="Email">
                    </p>
                    <p>
                        Password:<input type="password" required name="Password">
                    </p>
                    <p>
                        Confirm Password:<input type="password" required name="Confirm_Password">
                    </p>
                    <p>
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
