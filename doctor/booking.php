<?php
include("../value/connection.php");
include("../value/back.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Booking / Easymed</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="css/index.css">
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
                <li><a href="booking.php"><span style="color: rgb(197, 190, 190);">My bookings</span></a></li>
                <li><a href="../log/logout.php">logout</a></li>
            </ul>
</div>
<div class="body">
<?php
$f=0;
$query=mysqli_query($con,"SELECT * FROM docpost where docid=".$_SESSION['number']."  ORDER BY SID DESC");
$total=mysqli_num_rows($query);
if($total!=0){
  while($result=mysqli_fetch_assoc($query)){
      $f++;
      $docpostid=$result['sid'];
      $city=$result['city'];
      $spaddress=$result['spaddress'];
      $mediname=$result['mediname'];
      $fees=$result['fees'];
      $status=$result['status'];
      $date=$result['date'];
      $sid=$result['sid'];
    ?>

    <div class="mypost">
        <a href="mypost.php?docpostid=<?php echo $docpostid ;?>">
        <h3>City : <?php echo $city ?></h3>
        <h3>address : <?php echo $spaddress ?></h3>
        <h3>center : <?php echo $mediname ?></h3>
        <h3>fees : <?php echo $fees ?></h3>
        <p>post id : <?php echo $sid; ?></p>
        </a>
        <?php
        if($status==1){
            ?>
            <a class="repost" href="repostlogic.php?id=<?php echo $docpostid;?>">repost</a>
            <p style="color:red;">this booking is deactivated</p>
            <?php
        }
            else{
        ?>
        <a class="stopb" href="stopbooking.php?stop=<?php echo  $docpostid; ?>">stop booking</a>
        <?php      
        }
        ?>
        <p>booking date : <?php echo $date;  ?></p>
    </div>
    <?php
  }
}else{
?>
<center><h1 style="color:red ;margin-top:5%;">You do not have any booking</h1></center>
<center><h2 style="color:green ;margin-top:1%;">Post your first booking <a href="../home.php" style="text-decoration:underline;">Now</a></h2></center><br><br>


<?php
}
?>
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