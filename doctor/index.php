<?php
include("../value/connection.php");
include("../value/back.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My profile</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
</head>
<body>
<div class="navbar">
          <a href="../home.php">Easymed</a>
            <ul>
            <li><a href="index.php"><span style="color: rgb(197, 190, 190);">My profile</span></a></li>
                <li><a href="booking.php">My bookings</a></li>
                <li><a href="../log/logout.php">logout</a></li>
            </ul>
</div>

<?php
    $query=mysqli_query($con,"SELECT * FROM `doctor` where number='".$_SESSION['number']."'");
    $result=mysqli_fetch_array($query);
?>
 <div class="profile">
   <div class="logo">
    <?php
    if (file_exists("profilepic/" .$_SESSION['number'].".png"))
    {
      $pic="profilepic/" .$_SESSION['number'].".png";
    }
    else
    {
      $pic="../css/banner.jpg";
    }
    ?>
    
   <img src="<?php echo $pic;?>" alt=""></div>
   <div class="inform">
      <h1>Name :<?php echo $result['name'] ; ?> </h1>
      <h1>Speciality :<?php echo $result['cat'] ; ?> </h1>
   </div>
   <div class="inform2">
          <h2>Experience :<?php echo $result['expe'] ; ?> </h2>
          <h2>Fees :<?php echo $result['fees'] ; ?> </h2>
   </div>
   <div class="inform3">
   <h2>Email : <?php echo $result['email'] ?></h2>
   <h2>City : <?php echo $result['city'] ?></h2>
   </div>
   <div class="ab">
     <h3>Join : <?php echo $result['joining_date'] ?></h3>
     <h3>About :<?php echo $result['about'] ; ?> </h3>
   </div>
   <a href="edit.php">update profile</a>
   <a href="../password.php">update password</a>
 </div>
 
</body>
</html>