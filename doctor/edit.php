<?php
include("../value/connection.php");
include("../value/back.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
    <!--<title>Login & Registration Form</title>-->
    <title>update your details</title>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Edit your profile</span>

                <form action="editlogic.php" method="post" enctype="multipart/form-data">
                        <?php
                                    $query="SELECT * FROM `doctor` where number='".$_SESSION['number']."'";
                                    $data=mysqli_query($con,$query);
                                    $total=mysqli_num_rows($data);
                                    if($total!=0){
                                        while($result=mysqli_fetch_assoc($data)){
                                            $name=$result['name'];
                                            $number=$result['number'];
                                            $cat=$result['cat'];
                                            $city=$result['city'];
                                            $email=$result['email'];
                                            $about=$result['about'];
                                            $expe=$result['expe'];
                                            $fees=$result['fees'];
                                        }
                                    }else{
                                        echo "database is empty !!";
                                    }
                        ?>
                        <div class="input-field">
                    <input type="text" name="name" placeholder="enter your name" value="<?php echo $name;?>" >
                    <i class="uil uil-user"></i>
                    </div>


                    <div class="input-field">
                    <input type="file" name="propic" >
                    <i class="uil uil-photo"></i>
                    </div>


                    <div class="input-field">
                    <input readonly type="number" name="number" placeholder="enter your  number" value="<?php echo $number;?>" >
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                    </div>

                    <div class="input-field">
                    <input type="email" name="email" placeholder="enter your  email" value="<?php echo $email;?>" ><br><br>
                        <i class="uil uil-envelope icon"></i>
                    </div>

                    <select name="city" class="select" >
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
                    </select>
            
                    <div class="input-field">
                    <input type="text" name="about" placeholder="enter your  about" value="<?php echo $about;?>" >
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                    <div class="input-field">
                    <input type="text" name="expe" placeholder="enter your  experience" value="<?php echo $expe;?>" >
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>

                <select name="cat"  class="select">
                <option value="">catagory</option>
                <?php
                    $query="SELECT * FROM `doccat`";
                    $data=mysqli_query($con,$query);
                    while($result=mysqli_fetch_assoc($data)){
                        ?>
                        <option value="<?php echo $result['cat'];?>" <?=($cat==$result['cat'])?'Selected':'';?>><?php echo $result['cat']; ?></option>
                        <?php
                    }
                ?>
                </select>
                <div class="input-field">
                    <input type="text" name="fees" placeholder="enter your  fees" value="<?php echo $fees;?>" ><br><br>
                    <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
   
                <div class="input-field button">
                        <input type="submit" name="submit" value="Update">
                    </div>
                </form>

            </div>

            </div>
        </div>
    </div>


</body>
</html>