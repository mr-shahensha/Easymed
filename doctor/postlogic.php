<?php
include("../value/connection.php");
include("../value/back.php");
$query0=mysqli_query($con,"select cat from doctor where number='".$_SESSION['number']."'");
$result0=mysqli_fetch_assoc($query0);
$cat=$result0['cat'];
date_default_timezone_set("asia/kolkata");
$date = date('d/m/Y', time());
if(isset($_POST['submit'])){
    $city=$_POST['city'];
    $spaddress=$_POST['spaddress'];
    $mediname=$_POST['mediname'];
    $fees=$_POST['fees'];
    $docid=$_SESSION['number'];
    if($city==''or $spaddress==''or $mediname==''or $fees==''or $docid==''){
    ?>
    <script>
        alert('Please fill the data');
        document.location="../home.php";
    </script>
       <?php
}else{
    $query=mysqli_query($con,"INSERT INTO `docpost` (`sid`,`docid`,`cat`, `city`, `spaddress`, `mediname`, `fees`,`date`) VALUES (NULL,'$docid','$cat','$city', '$spaddress', '$mediname', '$fees','$date');");
}
}
?>

 <script>
     alert('Post Submitted')
     document.location="../home.php";
 </script>