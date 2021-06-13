<?php 
require("../constant.php");
require("../database.php");
require("../functions.php");
require("cusdatabase.php");

//prx($_POST);
$type = $_POST['type'] ;


  if($type=='add'){
          $fid = $_POST['fid'];
          $qty = $_POST['qty'];
          $price =( $_POST['price']);
          $rname = $_POST['rname'];
          
          $Reg_id = $rname."_".$fid ;
         // echo $Reg_id ;
          $time=date('Y-m-d h:i:s');  
          //echo "id".$_SESSION['CUSTOMER_ID']."fid".$fid."ses".$_SESSION['$fid'];
        if(isset($_SESSION['CUSTOMER_ID'])&&(!isset($_SESSION[$Reg_id]))){
          //echo $_SESSION['CUSTOMER_ID'];
          //echo "in register";
          $_SESSION[$Reg_id] = true ;
          mysqli_query($cusCon,"insert into cart values (NULL,'$fid','$qty','$price','$rname','$time')");
        }
        else{
            //echo "In update" ;
            mysqli_query($cusCon,"update cart set qty='$qty' , added_on='$time' where fid='$fid' AND rname='$rname'");
        }
  }

  if($type=='delete'){
  
    $cart_id = $_POST['cart_id'];
    $res=mysqli_query($cusCon,"delete from cart where cart_id=$cart_id");
  }

?>