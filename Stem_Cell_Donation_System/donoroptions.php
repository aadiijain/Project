<?php
session_start();
require "config.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Donor Home Page
        </title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <h1>Stem Cells Bank</h1>
        <h2 style="margin-left :60px;">
            <a href="homepage.php">
                <button class="button button2">Home</button>
            </a>
        </h2>
        <center>
        <p>
            <a href="don_appnt_booking.php"><button class="button button2" style="height: 50px; width: 200px;">Book an Appointment</button></a>
            &nbsp;&nbsp;&nbsp;
            <a href="don_updation.php"><button class="button button2" style="height:50px; width: 200px;">Update Details</button></a>
        </p>
        </center><br><br><br><br>
    </body>
</html>