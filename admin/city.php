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
    <title>Admin / City</title>
</head>
<body>
<div class="navbar">
          <a href="admin.php">Easymed</a>
            <ul>
                <li><a href="cat.php">catagory</a><br></li>
                <li><a href="city.php"><span style="color: rgb(197, 190, 190);">city</span></a><br></li>
                <li><a href="../password.php">change your password</a><br></li>
                <li><a href="../log/logout.php">logout</a></li>
            </ul>
</div>
<div class="form">
    <form  style="margin-left:40%;margin-top:4%;" action="citysub.php" method="post">
        <input class="inputbox" type="text" placeholder="Enter your catagory" name="city" required autocomplete="off">
        <input class="inputsub" type="submit" value="submit" name="submit">
    </form>
</div>
 
    <table  border="2" style="margin-left:25%;margin-top:4%;">
        <tr class="head">
            <td>city name</td>
            <td>delete</td>
        </tr>
        <?php
        $f=0;
        $query=mysqli_query($con,"SELECT * FROM `city`");
        $total=mysqli_num_rows($query);
        if($total!=0){
          while($result=mysqli_fetch_assoc($query)){
            $f++;
              $city=$result['city'];
              $sid=$result['sid'];
?>
<tr>
    <td><?php echo $city ;?></td>
    <td><a href="citydelete.php?sid=<?php echo $sid;?>"><img src="../css/delete.png" style="height:30px; width: 30px;" alt=""></a></td>
</tr>

    <?php
      }

    }else{
        echo" <h1 style='margin-top:2%;text-align:center; color:red;'>there is no city available</h1>";
    }
?>
    </table>
</body>
</html>

