<?php
include("../value/connection.php");
include("../value/back.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My profile</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="../doctor/css/profile.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
</head>
<body>
<div class="navbar">
          <a href="../index.php">Easymed</a>
            <ul>
            <li><a href="index.php"><span style="color: rgb(197, 190, 190);">My profile</span></a></li>
            <li><a href="search.php">Search your doctor</a></li>
                <li><a href="booking.php">My booking</a></li>
                <li><a href="../log/logout.php">Logout</a></li>
            </ul>
</div>

<?php
    $query=mysqli_query($con,"SELECT * FROM `customer` where number='".$_SESSION['number']."'");
    $result=mysqli_fetch_array($query);
?>
 <div class="profile">
   <div class="logo"><img src="../css/banner.jpg" alt=""></div>
   <div class="inform">
      <h2>Name :<?php echo $result['name'] ; ?> </h2>
      <h2>Number :<?php echo $result['number'] ; ?> </h2>
   </div>
   <div class="inform3" style="margin-right:20%;">
   <h2>Email : <?php echo $result['email'] ?></h2>
   <h2>City : <?php echo $result['city'] ?></h2>
   </div>
   <a href="edit.php">update profile</a>
   <a href="../password.php">update password</a>
 </div>
 
</body>
</html>