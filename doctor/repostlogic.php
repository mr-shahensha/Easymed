<?php
include("../value/connection.php");
include("../value/back.php");

$docpostid=$_REQUEST['id'];
$query=mysqli_query($con,"SELECT * FROM `docpost` where sid=$docpostid;");
$result=mysqli_fetch_assoc($query);
$docid= $result['docid'];
$cat= $result['cat'];
$city= $result['city'];
$spaddress= $result['spaddress'];
$mediname=$result['mediname'];
$fees=$result['fees'];
date_default_timezone_set("asia/kolkata");
$date = date('d/m/Y', time());
$query2=mysqli_query($con,"INSERT INTO `docpost` (`docid`,`cat`, `city`, `spaddress`, `mediname`, `fees`,`date`) VALUES ('$docid','$cat','$city', '$spaddress', '$mediname', '$fees','$date') ;");

?>
 <script>
     alert('Repost Submitted');
     document.location="booking.php";
 </script>
 repost done