<?php 
session_start();
$host = "localhost" ;
$uname = "root";
$pass = "" ;


$con = mysqli_connect($host,$uname,$pass,$_SESSION['RES_NAME']);



if(!$con)
{die("ERROR : ".$con->connect_error );}
?>