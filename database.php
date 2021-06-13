<?php

 $host = "localhost";
 $username = "root";
 $password = "";

 $con = mysqli_connect($host,$username,$password,"admin");

        if(!$con)
        {die("ERROR : ".$con->connect_error );}
?>