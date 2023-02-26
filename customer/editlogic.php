
<?php
include("../value/back.php");
include "../value/connection.php";
if(isset($_POST['submit'])){
$number=$_POST['number'];
$name=$_POST['name'];
$email=$_POST['email'];
$city=$_POST['city'];
$msg="Submited Successfully. Thank You";
$query1=" update `customer` set `city`='$city', `email`= '$email',`name`='$name'  where number='$number'";


$query2=" update `signup` set  `name`='$name'  where number='$number'";

$data=mysqli_query($con,$query1);
$data2=mysqli_query($con,$query2);

$con->close();

}
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="index.php";
</script>

