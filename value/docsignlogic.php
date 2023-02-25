<?php
include "../value/connection.php";
if (isset($_POST['sid']))
{
    $sid=$_POST['sid'];
}
else
{
    $sid=0;
}
$name=$_POST['name'];
$number=$_POST['number'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];



if($sid==0)
{
    if($name==''or $number==''or $password=='' or $cpassword=='')
    {
        ?>
        <script language="javascript">
        alert('Please Fill .......');
        window.history.go(-1);
        </script>
        <?php	
    }
    else{

        if($password!=$cpassword)
        {
            ?>
            <script language="javascript">
            alert('Password and confirm passwords are mismatched !!');
            window.history.go(-1);
            </script>
            <?php
        }
        else if(strlen($password)<=5)
        {
            ?>
            <script language="javascript">
            alert('Password should be 6 charecter !!');
            window.history.go(-1);
            </script>
            <?php
        }else if(strlen($number)>10 or strlen($number)<10){
            ?>
            <script language="javascript">
            alert('please enter valid number !!');
            window.history.go(-1);
            </script>
            <?php
        }else
            {
                $f=0;
                $getta=mysqli_query($con,"select * from signup where  number='$number' ")or die(mysqli_error());
                while($ro=mysqli_fetch_array($getta)){
                $f++;
            }
        if($f==0)
            {
                $query1="insert into signup (lvl,name,number, password) values('100','$name','$number','$password')";
                $result2=mysqli_query($con,$query1)or die(mysqli_error());

                date_default_timezone_set("asia/kolkata");
                $datetime = date('d/m/Y', time());
                $query2="insert into `doctor` (name,number,joining_date) values('$name','$number','$datetime')";
                $result2=mysqli_query($con,$query2)or die(mysqli_error());
                ?>
                <script language="javascript">
                  alert('Thank you for join Easymed');
                  document.location="../join.php";
                </script>
                <?php
            }
                else
                {
                    ?>
                    <script language="javascript">
                    alert('Mobile number or Email id are already exsist!!');
                    window.history.go(-1);
                    </script>
                    <?php
                }
        }
    }

}





?>