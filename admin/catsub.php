<?php
include("../value/connection.php");

if (isset($_POST['submit'])){
    $cat=$_POST['cat'];
    $query="INSERT INTO `doccat` (`sid`, `cat`) VALUES (NULL, '$cat')";
    $data=mysqli_query($con,$query);
}
$con->close();

?>


<script language="javascript">
alert('Thank you for join Easymed');
document.location="cat.php";
</script>
