<?php
include("../value/connection.php");
include("../value/back.php");

$docpostid=$_REQUEST['docpostid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking / Easymed</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../customer/booking.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
    <script type="text/javascript" src="../jquery-1.6.4.min.js"></script>
    <script>
            function status(value,sid){
                if(confirm('Are you sure ?')){
               $('#status'+sid).load('done.php?value='+value+'&sid='+sid).fadeIn('fast');
                }
            }
    </script>
</head>
<body>
<div class="navbar">
          <a href="../home.php">Easymed</a>
            <ul>
            <li><a href="index.php">My profile</a><br></li>
                <li><a href="booking.php">My bookings</a></li>
                <li><a href="../log/logout.php">logout</a></li>
            </ul>
</div>
<div class="details">
    <?php
        $query1=mysqli_query($con,"SELECT * FROM docpost where docid=".$_SESSION['number']." and sid= $docpostid");
        while($result1=mysqli_fetch_assoc($query1)){
        $city=$result1['city'];
        $spaddress=$result1['spaddress'];
        $mediname=$result1['mediname'];
        $fees=$result1['fees'];
        $date=$result1['date'];
        $sid=$result1['sid'];
        }
    ?>
        <div class="mypost">
        <h3>City : <?php echo $city ?></h3>
        <h3>address : <?php echo $spaddress ?></h3>
        <h3>center : <?php echo $mediname ?></h3>
        <h3>fees : <?php echo $fees ?></h3>
        <p>booking date : <?php echo $date;  ?></p>
        <p>post id : <?php echo $sid; ?></p>
    </div>
</div>
<div class="body" >
<?php
        $f=0;
        $query="SELECT * FROM `booking` where docpostid=$docpostid and doc_id='".$_SESSION['number']."' ORDER BY SID DESC";
        $data=mysqli_query($con,$query);
        $total=mysqli_num_rows($data);
        if($total!=0){
          while($result=mysqli_fetch_assoc($data)){
            $f++;
            $sid=$result['sid'];
            $cust=$result['cust_id'];
            $time=$result['bookingdate'];
            $status=$result['status'];
           
?>
<div class="card" >
    <div class="logo"> <img src="../css/banner.jpg" alt=""></div>
    <div class="info">
        <?php
            $query1="SELECT * FROM `customer` WHERE number='$cust'";
            $data1=mysqli_query($con,$query1);
            $result1=mysqli_fetch_assoc($data1);
        ?>
        <h2>name : <?php echo $result1['name'];?></h2>
        <h4>sid : <?php echo $sid;?></h4>
        <h4>address : <?php echo $result1['city'];?></h4>
        <p>time : <?php echo $time;?></p>
    </div>
    <div class="cancel" id="status<?php echo $sid; ?>">
        <?php

             if($status==1){
                 echo "<h4 style='color:red;'> you had cancel booking</h4>";
             }else if($status==10){
                 echo "<h4 style='color:green;'>your booking is done</h4>";
             }else if($status==0){
        ?>
        <select class="select" name="" id="result"  onchange="status(this.value,'<?php echo $sid;?>')">
            <option value="">Status</option>
            <option value="1">cancel</option>
            <option value="10">Done book</option>
        </select>
        <?php
             }else{
                echo "<h4 style='color:red;'>patient cancel this booking</h4>";
             }
        ?>
    </div>
</div>
<?php
      }

    }else{
     

?>
<center><h1 style="color:red ;margin-top:5%;"><?php  echo "You do not have any booking"; ?></h1></center><br><br>
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

    .select{
        background-color: rgba(0, 0, 0, 0.811);
        font-size:25px;
        font-weight:500;
        color:white;
        text-align:center;
        border-radius: 10px;
        font-family: 'Nunito', sans-serif;
    }
    .mypost{
    display: flex;
    flex-direction: column;
    margin-left:2%;
    background-color: white;
    border-left: 6px solid teal;
    height: 24%;
    width: 18%;
    padding: 20px;
    border-radius: 10px;
    top: 16%;
    position: fixed;
}
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