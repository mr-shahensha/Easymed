<?php 
include ("../value/connection.php");
include("../value/back.php");
$number=$_REQUEST['num'];
date_default_timezone_set("asia/kolkata");
$datetime = date('d/m/Y', time());
//main table
$query1 = "UPDATE `booking` SET `status` = '50' , canceldate='$datetime' WHERE sid='$number' and cust_id='".$_SESSION['number']."'";
$result1 = mysqli_query($con,$query1)or die (mysqli_error());

?>
<script language="javascript">
alert('Cancelation sucessful');
document.location="booking.php";
</script>
