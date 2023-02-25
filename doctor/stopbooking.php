<?php
include("../value/connection.php");
$stop=$_REQUEST['stop'];
$num=1;
$query=mysqli_query($con,"update `docpost` set `status`='$num' where sid='$stop'");
$con->close();
?>
<script language="javascript">
alert('Booking is stop');
document.location="booking.php";
</script>