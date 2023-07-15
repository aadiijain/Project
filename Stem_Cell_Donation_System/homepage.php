<?php
session_start();
require "config.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Stem Cell Donation Bank
        </title>
        <link rel="stylesheet" href="styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Stem Cells Bank</h1>
        <h2 style="margin-left :75px;">
            <a href="homepage.php">
                <button class="button button1">Home</button>
            </a>
            <a href="#id1">
                <button class="button button1">About</button>
            </a>
            <a href="#id2">
                <button class="button button1">Contact</button>
            </a>
            <a href="admin_login.php">
                <button class="button button1">Admin</button>
            </a>
            </h2>
        <br><br>
        <p style="margin-left: 45px; font-size: 22px;">A stem cell is a cell with the unique ability to develop into specialised cell types<br> in the body. Stem cells provide new cells for the body as it grows, and replace <br> specialised cells that are damaged or lost. They have two unique properties that <br>enable them to do this:<br><ul>
            <li style="margin-left: 45px; font-size: 22px;">They can divide over and over again to produce new cells.</li>
            <li style="margin-left: 45px; font-size: 22px;">As they divide, they can change into the other types of cell that <br>make up the body.</li>
        </ul>
        </p>
        <p style="margin-left: 230px; margin-top: 45px;"><a href="mainlogin.php"><button class="button button2" style="height: 70px; width: 200px; font-size: 25px; font-family: Segoe UI, Tahoma, Geneva, Verdana, 'sans-serif';">Login</button></a></p>
        <br><br><br><br><br><br><br><br><br>
        <img src="what_are_stem_cells.png" alt="Stem cells" width="100%" height="400px">
        <section id="id1">
            <br><br>
            <center>
                <p style="font-size:45px; color: white; ">About Us</p>
                <p style="font-size: 30px; color: white; text-align: center; margin-bottom: 50px;">
                    Stem cell banking or preservation is the extraction, <br>processing and storage of stem cells, so <br>that they may be used for treatment in the future, when required.
                    <br> <br>
                    Stem Cells have the amazing power to transform into<br> any tissue or organ in your body.<br>It is due to this unique characteristic that they<br> have the potential to treat over 80 approved<br> life threatening conditions, and provide numerous benefits <br>to the human body.
                </p>
                <br>
            </center>
        </section>
        <section id="id2">
        <center>
            <br><br><br><br><br>
            <p style="background-color: white; padding:200px; color: rgb(31, 24, 135);">
            <span style="font-size: 55px;">Contact</span><br><br><br>
            <span style="font-size:40px;">Phone: 9875602793, 8792654792<br>
                EMail: stemcellbanking@gmail.com</span>
            </p>
        </center>
        </section>
    </body>
</html>