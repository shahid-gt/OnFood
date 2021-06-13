
<?php
function redirect($link){
    ?>
    <script>
        window.location.href="<?php echo $link ?>";
    </script>
    <?php
  
}

function getUserCart($cusCon){
    $arr=array();
    $res=mysqli_query($cusCon,"select * from cart ");
  /*  if($con2){
        echo "Successfull" ;
    }
    global $con;
	
	$id=$_SESSION['FOOD_USER_ID'];
    */
	$i=0;
	while($row=mysqli_fetch_assoc($res)){
		$arr[]=$row;
        $fid = $arr[$i]['fid'];
        $resname = $arr[$i]['rname'];
       // echo "in func ".$resname." with fid ".$fid ;
        //now get the connection for that restaurant . 
        $ResCon = mysqli_connect("localhost","root","",$resname);

        $restres = mysqli_query($ResCon,"select * from food where fid='$fid'");

        $restRow=mysqli_fetch_assoc($restres) ;

        $arr[$i]['fname']=$restRow['fname'];
        $arr[$i]['fimage']=$restRow['image'];
        //echo $restRow['fname'];
        $i++;
    }
    return $arr ;
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	
}

function getDishPriceById($id){


}

?>