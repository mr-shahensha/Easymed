<?php
include("value/connection.php");
include("value/back.php");
?>
<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="signup/css/index.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
    <!--<title>Login & Registration Form</title>-->
    <title>change your password</title>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Change your password</span>

                <form action="log/passlogic.php" method="post">
            
                        <div class="input-field">
                        <input type="password" name="opassword" placeholder="Enter your password">
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                    <input type="password" name="npassword" placeholder="Enter your new password">
                        <i class="uil uil-lock icon"></i>
                    </div>
                    
                    <div class="input-field">
                    <input type="password" name="cpassword" placeholder=" confirm your new password">
                        <i class="uil uil-lock icon"></i>
                    </div>
   
                <div class="input-field button">
                        <input type="submit" name="submit" value="submit">
                    </div>
                </form>

            </div>

            </div>
        </div>
    </div>


</body>
</html>