<?php
include("../value/connection.php");
include("../value/back.php");
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
    <link rel="stylesheet" href="../signup/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
    <!--<title>Login & Registration Form</title>-->
    <title>update your details</title>
</head>
<body>
        
    <div class="container" style="margin-top:5%;">
        <div class="forms">
            <div class="form login">
                <span class="title">Edit your profile</span>

                <form action="editlogic.php" method="post">
            <?php
        $query="SELECT * FROM `customer` where number='".$_SESSION['number']."'";
        $data=mysqli_query($con,$query);
        $total=mysqli_num_rows($data);
        if($total!=0){
            while($result=mysqli_fetch_assoc($data)){
                $name=$result['name'];
                $number=$result['number'];
                $city=$result['city'];
                $email=$result['email'];
            }
        }else{
            echo "database is empty !!";
        }
        ?>
                    <div class="input-field">
                    <input type="name" name="name" placeholder="enter your name" value="<?php echo $name;?>" required>
                    <i class="uil uil-user"></i>
                    </div>
                    
                    <div class="input-field">
                    <input readonly type="number" name="number" placeholder="enter your  number" value="<?php echo $number;?>">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>                         
                    </div>

                    <div class="input-field">
                    <input type="email" name="email" placeholder="enter your  email" value="<?php echo $email;?>" >br><br>
                        <i class="uil uil-envelope icon"></i>
                    </div>

            
                    <select class="select" name="city" >
                <option value="">City</option>
                <?php
                    $query="SELECT * FROM `city`";
                    $data=mysqli_query($con,$query);
                    while($result=mysqli_fetch_assoc($data)){
                     ?>
                        <option  value="<?php echo $result['city'];?>" <?=($city==$result['city'])?'Selected':'';?>><?php echo $result['city']; ?></option>
                        <?php
                    }
                ?>
                    </select><br><br>
               
   
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
