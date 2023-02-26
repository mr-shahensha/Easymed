<?php
include("../value/connection.php");
include("../value/back.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="cat.css">
    <link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
    <title>Admin/Category</title>
</head>
<body>
<div class="navbar">
          <a href="admin.php">Easymed</a>
            <ul>
                <li><a href="cat.php"><span style="color: rgb(197, 190, 190);">category</span></a><br></li>
                <li><a href="city.php">city</a><br></li>
                <li><a href="../password.php">change your password</a><br></li>
                <li><a href="../log/logout.php">logout</a></li>
            </ul>
</div>
<div class="form">
    <form  style="margin-left:40%;margin-top:4%;" action="catsub.php" method="post">
        <input class="inputbox" type="text" placeholder="Enter your catagory" name="cat" required autocomplete="off">
        <input class="inputsub" type="submit" value="submit" name="submit">
    </form>
</div>
 
    <table  border="2" style="margin-left:25%;margin-top:4%;">
        <tr class="head">
            <td>category</td>
            <td>delete</td>
        </tr>
        <?php
        $f=0;
        $query=mysqli_query($con,"SELECT * FROM `doccat`");
        $total=mysqli_num_rows($query);
        if($total!=0){
          while($result=mysqli_fetch_assoc($query)){
            $f++;
              $cat=$result['cat'];
              $sid=$result['sid'];
?>
<tr>
    <td><?php echo $cat ;?></td>
    <td><a href="catdelete.php?sid=<?php echo $sid;?>"><img src="../css/delete.png" style="height:30px; width: 30px;" alt=""></a></td>
</tr>

    <?php
      }

    }else{
        echo" <h1 style='margin-top:2%;text-align:center; color:red;'>there is no catagory available</h1>";
    }
?>
    </table>
   
</body>
</html>

