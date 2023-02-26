<?php
include("../value/connection.php");
include("../value/back.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Booking</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="booking.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
</head>
<body>
<div class="navbar">
          <a href="../index.php">Easymed</a>
            <ul>
                <li><a href="index.php">My profile</a></li>
                <li><a href="search.php">Search your doctor</a></li>
                <li><a href="booking.php"><span style="color: rgb(197, 190, 190);">My booking</span></a></li>
                <li><a href="../log/logout.php">Logout</a></li>
            </ul>
</div>
<div class="body">
<?php
        $f=0;
        $query="SELECT * FROM `booking` where cust_id='".$_SESSION['number']."' ORDER BY SID DESC";
        $data=mysqli_query($con,$query);
        $total=mysqli_num_rows($data);
        if($total!=0){
          while($result=mysqli_fetch_assoc($data)){
            $f++;
        $sid=$result['sid'];
        $doc=$result['doc_id'];
        $time=$result['bookingdate'];
        $date= $result['canceldate'];
        if (file_exists("../doctor/profilepic/" .$doc.".png"))
        {
          $pic="../doctor/profilepic/" .$doc.".png";
        }
        else
        {
          $pic="css/banner.jpg";
        }

?>
<div class="card">
    <div class="logo"> <img src="<?php echo $pic;?>" alt=""></div>
    <div class="info">
        <?php
            $query1="SELECT * FROM `doctor` WHERE number='$doc'";
            $data1=mysqli_query($con,$query1);
            $result1=mysqli_fetch_assoc($data1);
        ?>
        <h2>Dr. <?php echo $result1['name']; ?></h2>
        <h4>Speciality : <?php echo $result1['cat'];?></h4>
        <h4>Address : <?php echo $result1['city'];?></h4>
        <p>Time : <?php echo $time;?></p>
    </div>
    <div class="cancel">
    <?php

        $query2="SELECT status FROM `booking` WHERE cust_id='".$_SESSION['number']."' and sid='$sid'";
        $data2=mysqli_query($con,$query2);
        $result2=mysqli_fetch_assoc($data2);
        if($result2['status']==0){
            ?>
       <a href="cancel.php?num=<?php echo $sid?>" title="Click to cancel booking">cancel</a> 
            <?php
        }else if($result2['status']==10)
        {
            echo "<h4 style='color:green;'>your booking is done</h4>";
        }
        else if($result2['status']==50)
        {
        ?>
          <h4 style='color:red;'>Booking canceled <br> on <?php echo $date; ?></h4>
        <?php
        }
        else{
            echo "<h4 style='color:red;'>Doctor rejected this</h4>";
        }
       ?>
    </div>
    
</div>
<?php
      }

    }else{
     

?>
<center><h1 style="color:red ;margin-top:5%;">You didnot book any doctor</h1></center><br><br>
<center><h2>Book your first doctor now</h2><a style="font-size:25px;color:green;" href="search.php">Book now</a></center>
<?php
    }
?>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="../css/backtotop.png" height="30px" width="30px"></button>

</body>
</html>


<script>
    //Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
  
}

$("li:last").click(function(){
  $("body").toggleClass("dark");
});
</script>

<style>

#myBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px;
    background-color:white;
    border-radius: 50px;
  }
  #myBtn:hover{
    background-color:teal;
  }
</style>