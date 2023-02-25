<?php
include("../value/connection.php");

if (isset($_POST['submit'])){
    $city=$_POST['city'];
    $query="INSERT INTO `city` (`sid`, `city`) VALUES (NULL, '$city')";
    $data=mysqli_query($con,$query);
}
$con->close();

?>


<script language="javascript">
alert('city added successsfully');
document.location="city.php";
</script>
