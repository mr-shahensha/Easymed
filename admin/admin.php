<?php
include("../value/connection.php");
include("../value/back.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon"
        href="https://www.kindpng.com/picc/m/136-1369817_blue-white-letter-e-logo-design-png-e.png"
        type="image/x-icon">
<link rel="stylesheet" href="../css/nav.css">
    <title>Admin page / Easymed</title>
    <script type="text/javascript" src="../jquery-1.6.4.min.js"></script>
    <script>
      function search(result1){
        $('#search').load('option.php?result='+result1).fadeIn('fast');
      }
      </script>
</head>
<body>
<div class="navbar">
          <a href="admin.php">Easymed</a>
            <ul>
                <li><a href="cat.php">catagory</a><br></li>
                <li><a href="city.php">city</a><br></li>
                <li><a href="../password.php">change your password</a><br></li>
                <li><a href="../log/logout.php">logout</a></li>
            </ul>
</div>
<h1 style="text-align:right; margin-top:5%; margin-right:15px;">hello admin <?php echo $_SESSION['name'];?></h1>
<select style="margin-left:40%; margin-top:-2%;" class="select1"  name="result" id="result" onchange="search(this.value)">
      <option value="">Search an option</option>
      <option value="0">Admin</option>
      <option value="100">Doctor</option>
      <option value="5">Customer</option>
</select>


  <div id="search">

  </div>

</body>
</html>