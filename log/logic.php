<?php
include("../value/connection.php");
    if(isset($_POST['submit'])){
        $number=$_POST['number'];
        $password=$_POST['password'];
        //$rm=$_POST['rm'];
        if($number=='' or $password=='')
        {
            ?>
            <script>
                alert("please enter your number and password");
                window.history.go(-1);
            </script>
            <?php
        }else{
            $result=mysqli_query($con,"SELECT * FROM `signup` Where number='$number'") or die("failed to login in login.php page ");
            if ($row = mysqli_fetch_array($result))
                {
                    
                    if($password==$row['password'])
                    {   
                        date_default_timezone_set("asia/kolkata");
                        $datetime = date('d/m/Y h:i:s a', time());
                        $query2=" update `signup` set  `lastlogin`='$datetime'  where number='$number'";
                        $data2=mysqli_query($con,$query2);
                        
                        session_start();
                        session_unset();
                        $_SESSION['name']=$row['name'];
                        $_SESSION['lvl']=$row['lvl'];
                        $_SESSION['number']=$number;
                        $_SESSION['password']=$password;

                        				// send the the cookie if needed
				    // if($rm=="1"){

                    // setcookie('cunm',$number,(time()+604800));
    
                    // setcookie('cups',$password,(time()+604800));
    
                    // }
                        
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
                            document.location="../admin/admin.php";
                            </script>
                            <?php

                        }//adminElse

                    }else{
                            ?>
                            <script>
                            alert(" password doesnot match");
                            window.history.go(-1);
                            </script>
                            <?php
                        }
                }
                else{
                    ?>
                    <script>
                        alert(" ID doesnot match");
                       window.history.go(-1);
                    </script>
                    <?php
                }
            }
        }
    


?>