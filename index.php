<?php
include("value/connection.php");
//include("value/back.php");
session_start();
if(!isset($_SESSION['number'])){
    die(header("location:join.php"));
}else{
    $number=$_SESSION['number'];
    $result=mysqli_query($con,"SELECT * FROM `signup` Where number='$number'") or die("failed to login in login.php page ");
            if ($row = mysqli_fetch_array($result)){
                if($row['lvl']==100)
                {
                    die(header("location:home.php"));
                }
                if($row['lvl']==0)
                {
                    die(header("location:admin/admin.php"));
                }
                
            }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home / Easymed</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>
    <script>
      function book(num,docpostid){
        if(confirm("Are You Sure?"))
        {
          $('#bookdiv'+num).load('customer/booklogic.php?docid='+num+'&docpostid='+docpostid).fadeIn('fast');
          alert('booked successflly');
        }
        
      }
    </script>
</head>
<body>
<div class="navbar">
          <a href="index.php">Easymed</a>
            <ul>
                <li><a href="customer/index.php">My profile</a></li>
                <li><a href="customer/search.php">Search your doctor</a></li>
                <li><a href="customer/booking.php">My booking</a></li>
                <li><a href="log/logout.php">Logout</a></li>
            </ul>
</div>

<h1 style="text-align:right; top:10%; margin-right:15px;position:sticky;">hello <?php echo $_SESSION['name'];?></h1>
<?php
        $f=0;
        $query="SELECT * FROM `docpost`  where status='0' ORDER BY SID DESC";
        $data=mysqli_query($con,$query);
        $total=mysqli_num_rows($data);
        if($total!=0){
          while($result=mysqli_fetch_assoc($data)){
            $f++;
            $docpostid=$result['sid'];
            $number=$result['docid'];
              $city=$result['city'];
              $spaddress=$result['spaddress'];
              $mediname=$result['mediname'];
              $fees=(integer)$result['fees'];
    
?>

<div class="card">
  <?php
   $query2="SELECT * FROM `doctor` Where number=$number";
   $data2=mysqli_query($con,$query2);
     while($result2=mysqli_fetch_assoc($data2)){
         $name=$result2['name'];
         $cat=$result2['cat'];
         $expe=$result2['expe'];

    if (file_exists("doctor/profilepic/" .$number.".png"))
    {
      $pic="doctor/profilepic/" .$number.".png";
    }
    else
    {
      $pic="css/banner.jpg";
    }
    ?>

  <img src="<?php echo $pic;?>">
  <h1>Dr. <?php echo $name; ?></h1><p>(<?php echo $cat ?> specialist)</p>
  <p>Fees : <span style="color:green;"><?php echo $fees; ?></span></p>
  <div class="one">
  <p>city : <?php echo $city ?></p>
  <p>location : <?php echo $spaddress ?></p>
  </div>
  <div class="two">
  <p>center : <?php echo $mediname ?></p>
  <p>Experience : <?php echo $expe ?></p>
  </div>
  <p><button onclick="book('<?php echo $number;?>','<?php echo $docpostid;?>');">Book Now</button></p>
</div>
<div id="bookdiv<?php echo $number;?>">
  </div>

  <?php
     }
      }

    }else{
     

?>
<center><h1 style="color:red ; margin-top:5%;"><?php  echo "there is no doctor available"; ?></h1></center>
<?php
    }
?>




<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="css/backtotop.png" height="30px" width="30px"></button>
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

