<?php
include("../value/connection.php");
$result=$_REQUEST['result'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Document</title>
        <script type="text/javascript" src="../jquery-1.6.4.min.js"></script>
    <script>
      function book(num,docpostid){
        if(confirm("Are You Sure?"))
        {
          $('#bookdiv'+num).load('booklogic.php?docid='+num+'&docpostid='+docpostid).fadeIn('fast');
          alert('booked successflly');
        }
        
      }
    </script>
</head>
<body>
    <center><h1>you chose your doctor type <span style="color:green;"><?php echo $result ; ?></span></h1></center>
<?php

        $f=0;
        $query="SELECT * FROM `docpost` WHERE status='0' and cat='$result'";
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

      $query1="SELECT * FROM `doctor` Where number=$number";
      $data1=mysqli_query($con,$query1);
      while($result1=mysqli_fetch_assoc($data1)){
      $name=$result1['name'];
      $about=$result1['about'];
      $cat=$result1['cat'];
      $expe=$result1['expe']; 
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
<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="css/backtotop.png" height="30px" width="30px"></button>


</body>
</html>