<?php 
require('../database.php');
require('../functions.php');
$res = mysqli_query($con,"select * from restaurant");
    while($row = mysqli_fetch_assoc($res)){
        $resName[]=$row['rname'];
    }
   // echo $resName ;
    prx($resName);
    echo sizeof($resName);
    echo "Ha bhai";
?>