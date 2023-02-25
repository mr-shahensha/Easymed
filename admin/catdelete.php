<?php
include("../value/connection.php");
$sid=$_REQUEST['sid'];

$query=mysqli_query($con,"delete from doccat where sid='$sid'");

$msg="deletion sucessful";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="cat.php";
</script>