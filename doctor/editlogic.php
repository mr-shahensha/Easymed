<?php
include("../value/back.php");
include "../value/connection.php";
if(isset($_POST['submit'])){
$number=$_POST['number'];
$name=$_POST['name'];
$email=$_POST['email'];
$city=$_POST['city'];
$about=$_POST['about'];
$expe=$_POST['expe'];
$cat=$_POST['cat']; 
$fees=$_POST['fees'];
$query1=" update `doctor` set  `email`= '$email',`name`='$name',`cat`='$cat',`city`='$city',`about`='$about',`expe`='$expe' ,`fees`='$fees' where number='$number'";


$query2=" update `signup` set  `name`='$name'  where number='$number'";

$data=mysqli_query($con,$query1);
$data2=mysqli_query($con,$query2);

$con->close();
$allowedExts = array("gif", "jpeg", "jpg", "png","PNG");
$temp = explode(".", $_FILES["propic"]["name"]);
$extension = end($temp);
if (($_FILES["propic"]["size"] <= 327680)&& in_array($extension, $allowedExts))
  {
  if ($_FILES["propic"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["propic"]["error"] . "<br>";
    }
  else
    {
      
	  $pic1="profilepic/".$number.".png";
	  

      move_uploaded_file($_FILES["propic"]["tmp_name"],$pic1);
        
    }
  }
else
  {
  ?>
  <script>
    alert("image size is too big");
  </script>
  <?php
  }
}
?>
<script language="javascript">
document.location="index.php";
</script>
<?php
