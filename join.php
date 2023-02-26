<?php
include("value/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- media -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
    <!-- media -->
    <link rel="stylesheet" href="css/index.css">
    <title>Easymed</title>
</head>
<body>
    <div class="banner">

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-align-justify"></i>
        </label>
        <label><a class="logo" href="join.php"> Easymed</a></label>
        <ul>
            <li><a href="login.php">Login here</a></li>
            <li><a href="#">service</a></li>
            <li><a href="#">about</a></li>
            <li><a href="#">contact</a></li>
        </ul>
    </nav>
        <!-- <div class="navbar">
            <h1>Easymed</h1>
            <ul> -->
                <!-- <li><a href="log/login.php">Login here</a></li>
                <li><a href="#">service</a></li>
                <li><a href="#">about</a></li>
                <li><a href="#">contact</a></li> -->
            <!-- </ul>
        </div> -->
        <div class="content">
            <h2>
                Your best medical health <br> service provider
            </h2>
            <p>
                book your next doctor here 
            </p>
            <div>
                <button type="button" onclick="window.location.href='http://localhost/college/docsign.php';">
                   <span> </span>join as doctor
                </button>
                <button type="button" onclick="window.location.href='http://localhost/college/custsign.php';">
                <span></span> book a doctor
                </button>
                <br>
            </div>
        </div>
    </div>
</body>
</html>
  