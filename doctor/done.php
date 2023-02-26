<?php
include("../value/connection.php");
include("../value/back.php");
$status=$_REQUEST['value'];
$sid=$_REQUEST['sid'];
//main table
$query1="UPDATE `booking` SET `status` = '$status' WHERE `sid` = '$sid'";
$result1=mysqli_query($con,$query1)or die(mysqli_error());

if($status==1){
    echo "<h4 style='color:red;'> you had cancel booking</h4>";
}else if($status==10){
    echo "<h4 style='color:green;'>your booking is done</h4>";
}


?>