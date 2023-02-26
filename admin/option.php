<?php
include("../value/connection.php");
$result=$_REQUEST['result'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="cat.css">
    <title>Document</title>
</head>
<body>
<table border="2" style="margin-left:25%;margin-top:4%;">
<tr class="head">
    <td>no</td>
    <td>name</td>
    <td>number</td>
    <td>last login</td>
</tr>
<?php
        $f=0;
        $query="SELECT * FROM `signup` WHERE lvl='$result'";
        $data=mysqli_query($con,$query);
        $total=mysqli_num_rows($data);
        if($total!=0){
          while($result=mysqli_fetch_assoc($data)){
            $f++;
              $number=$result['number'];
              $name=$result['name'];
              $sid=$result['sid'];
              $date=$result['lastlogin'];
?>

<tr>
    <td><?php echo $f ?></td>
    <td><?php echo $name ?></td>
    <td><?php echo $number ?></td>
    <td><?php echo $date ?></td>
</tr>
<?php
      }

    }
?>
</table>

</body>
</html>