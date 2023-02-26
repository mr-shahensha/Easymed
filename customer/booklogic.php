<?php
include("../value/connection.php");
include("../value/back.php");
$num=$_REQUEST['docid'];
$docpostid=$_REQUEST['docpostid'];

date_default_timezone_set("asia/kolkata");
$datetime = date('d/m/Y', time());
$custid=$_SESSION['number'];

//insert into main table
$query1="insert into `booking` (docpostid,doc_id,cust_id,bookingdate) values('$docpostid','$num','$custid','$datetime')";
$result1=mysqli_query($con,$query1)or die(mysqli_error());

?>

<p style="margin-left:66%;color:green;"> Booked .......</p>
