<?php
include("connection.php");
session_start();
if(!isset($_SESSION['number'])){
    die(header("location:../join.php"));
}
?>

