<?php
session_start();
require "config.php";
?>
<!DOCTYPE html>
<html>
    <head>
    <title>
        Login/Signup
    </title>
    <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <h1>Stem Cells Bank</h1>
        <h2 style="margin-left :60px;"><a href="homepage.php"><button class="button button2" style="margin-top: 10px;">Home</button></a></h2>
        <center>
            <p style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 30px;">Want to donate?
                <a href="don_login.php">
                    <button class="button button2" style="height: 70px; width: 150px; font-size: 20px; font-family: Segoe UI, Tahoma, Geneva, Verdana, 'sans-serif';">Click Here</button>
                </a>
            </p>
            <p style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 30px;">In need of a stem cell?
                <a href="recp_login.php">
                    <button class="button button2" style="height: 70px; width: 150px; font-size: 20px; font-family: Segoe UI, Tahoma, Geneva, Verdana, 'sans-serif';">Click Here</button>
                </a>
            </p>
        <br><br>
        <br><br><br>
        </center>
    </body>
</html>