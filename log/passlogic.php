<?php
include("../value/back.php");
include("../value/connection.php");

if(isset($_POST['submit'])){
    $opass=$_POST['opassword'];
    $npass=$_POST['npassword'];
    $cpass=$_POST['cpassword'];

if($opass=='' or $npass=='' or $cpass==''){
    ?>
    <script>
        alert("please fill the data !!");
        window.history.go(-1);
    </script>
    <?php
}else if(strlen($npass)<=5){
    ?>
    <script>
        alert("enter password in between 6 digit lenght !!");
        window.history.go(-1);
    </script>
    <?php

}else {
    $number=$_SESSION['number'];
    $result=mysqli_query($con,"SELECT * from signup Where number='$number'") or die("failed to login in login.php page ");
    $row=mysqli_fetch_array($result);
    if($opass==$row['password'] and $npass==$cpass){
        $query="update `signup` set `password`='$npass' where number='$number'";
        $data=mysqli_query($con,$query);

        if($row['lvl']==100){
            ?>
            <script language="javascript">
            document.location="../home.php";
            </script>
            <?php
        }//lvl
        elseif($row['lvl']==5){
            ?>
            <script language="javascript">
            document.location="../index.php";
            </script>
            <?php
        }//lvl_Else
        else{
            ?>
            <script language="javascript">
            document.location="../admin.php";
            </script>
            <?php

        }//adminElse

    }else{
        ?>
        <script language="javascript">
            alert('old password maybe wrong or password and confirm password doesnot match');
            window.history.go(-1);
        </script>
    <?php
    }

}



}

?>