<?php
include("../value/connection.php");
include("../value/back.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
    <link rel="stylesheet" href="../css/card.css">
    <script type="text/javascript" src="../jquery-1.6.4.min.js"></script>
    <script>
      function search(result1){
        $('#search').load('searchresult.php?result='+result1).fadeIn('fast');
      }
      function book(num,docpostid){
        if(confirm("Are You Sure?"))
        {
          $('#bookdiv'+num).load('booklogic.php?docid='+num+'&docpostid='+docpostid).fadeIn('fast');
          alert('booked successflly');
        }
        
      }
    </script>
<link rel="stylesheet" href="../css/nav.css"></head>
<link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
<body>

<div class="navbar">
          <a href="../index.php">Easymed</a>
            <ul>
                <li><a href="index.php">My profile</a></li>
                <li><a href="search.php"><span style="color: rgb(197, 190, 190);">Search your doctor</span></a></li>
                <li><a href="booking.php">My booking</a></li>
                <li><a href="../log/logout.php">Logout</a></li>
            </ul>
</div>

      <select class="select1"  name="result" id="result" onchange="search(this.value)">
      <option value="">Click to search</option>
      <?php
        $query=mysqli_query($con,"SELECT * FROM `doccat`")or die(mysqli_error());
        while($result=mysqli_fetch_array($query)){
          $cat=$result['cat'];
          ?>
          <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
          <?php
        }
      ?>
      </select>


  <div id="search">
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
         if (file_exists("../doctor/profilepic/" .$number.".png"))
         {
           $pic="../doctor/profilepic/" .$number.".png";
         }
         else
         {
           $pic="../css/banner.jpg";
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
<center><h1 style="color:red ;"><?php  echo "there is no doctor available"; ?></h1></center>
<?php
    }
?>
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="../css/backtotop.png" height="30px" width="30px"></button>
</div>
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

