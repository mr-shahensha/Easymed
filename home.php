<?php
include("value/connection.php");
include("value/back.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home / Easymed</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="doctor/css/index.css">
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
          <a href="home.php">Easymed</a>
            <ul>
                <li><a href="doctor/index.php">My profile</a><br></li>
                <li><a href="doctor/booking.php">My bookings</a></li>
                <li><a href="log/logout.php">logout</a></li>
            </ul>
</div>
<h1 style="text-align:right; margin-top:5%; margin-right:15px;">hello <?php echo $_SESSION['name'];?></h1>
<div class="post">
    <form action="doctor/postlogic.php" method="post">
        <div class="post1">
            <select name="city" id="">
                    <option value="">City</option>
                    <?php
                        $query=mysqli_query($con,"select city from city");
                        while($result=mysqli_fetch_assoc($query)){
                            ?>
                    <option value="<?php echo $result['city']; ?>"><?php echo $result['city']; ?></option>
                            <?php
                        }
                    ?>
            </select>
            <input type="text" placeholder="enter specific address" name="spaddress">
        </div>
        <div class="post2">
        <input type="text" placeholder="medical canter name" name="mediname">
        <input type="text" placeholder="medical fees" name="fees">
        </div>
        <input type="submit" name="submit" value="submit">

        
    </form>
</div>


<!-- timeline -->

<?php
$f=0;
$query=mysqli_query($con,"SELECT * FROM docpost where docid=".$_SESSION['number']." and status=0 ORDER BY SID DESC");
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
        <a href="doctor/mypost.php?docpostid=<?php echo $docpostid ;?>">
        <h3>City : <?php echo $city ?></h3>
        <h3>address : <?php echo $spaddress ?></h3>
        <h3>center : <?php echo $mediname ?></h3>
        <h3>fees : <?php echo $fees ?></h3>
        <p>post id : <?php echo $sid; ?></p>
        </a>
        <a class="stopb" href="doctor/stopbooking.php?stop=<?php echo  $docpostid; ?>">stop booking</a>
        <p>booking date : <?php echo $date;  ?></p>
    </div>
    <?php
  }
}else{
?>
<center><h1 style="color:red ;margin-top:5%;"><?php  echo "You do not have any booking"; ?></h1></center><br><br>

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