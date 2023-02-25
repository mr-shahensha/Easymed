<?php
$server="localhost";
$username="root";
$password="";
$database="college_project";

if(!$con=mysqli_connect($server,$username,$password,$database)){
    die("failed to connect");
}

?>