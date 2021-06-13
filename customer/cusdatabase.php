<?php 
session_start() ;
$host = "localhost" ;
$uname = "root";
$pass = "" ;

$DB= $_SESSION['CUSTOMER_NAME'];


function getResCon($resname){
    global $host , $uname , $pass ;
    $ResCon = mysqli_connect($host,$uname,$pass,$resname);
    return $ResCon ;
}

 $cusCon= mysqli_connect($host,$uname,$pass,$DB);
 
 $adminCon = mysqli_connect($host,$username,$password,"admin");

if(!$con)
{die("ERROR : ".$con->connect_error );}


if(!$cusCon)
{die("ERROR : ".$con->connect_error );}

?>