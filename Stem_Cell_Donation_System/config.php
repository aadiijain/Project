<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

$server = "localhost";
$username = "root";
$pwd = "";

// Try connecting to the Database
$conn = mysqli_connect($server,$username,$pwd);

//Check the connection
if(!$conn){
    die('Error: Cannot connect');
}
// else{
//     echo "Successfully connected.";
// }

?>