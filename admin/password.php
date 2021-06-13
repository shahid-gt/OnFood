<?php
require('top.php');
$msg="";
if(isset($_POST['set'])){

    $pass = $_POST['pass2'] ;
    
    if($_POST['pass1']==$_POST['pass2']){
        $idf = $_POST['hid'];
        $sql = "update restaurant set rpass='$pass' where rid=$idf";
        if($con->query($sql) == true ){
            echo "password submitted " ;
        }
        else{
            echo " Error : $sql <br> $con->error " ;
        }
        redirect("index.php");

    }

}
$idf = $_GET['id'] ;
$rname = $_GET['name'];   

?>
<img class="bg myfont2" src="image/i1.jpg">
<div class="center myfont2">
    <form method="POST" >
        <table>
            <tr>
                <td>
                    <label>enter password : </label>
                </td>
                <td>
                    <input id="st" type="text" size="50" name="pass1">
                </td>
            </tr>
            <tr>
                <td>
                    <label>reenter password : </label>
                </td>
                <td>
                    <input id="st" type="text" size="50" name="pass2">
                </td>
            </tr>
            <tr>
            <td>
                <div class="btn">
                    <input type="submit" id="submit" name="set" value="Set password">
                </div>
            </td>
            </tr>
        </table>
        
<input type="text" name="hid" value="<?php echo $idf ; ?>" style="visibility : hidden " >
    </form>
</div>

<div class="alert alert-success mx-5" role="alert">
    <?php echo $_GET['msg1'] ; ?>
</div> 



<div class="alert alert-success mx-5" role="alert">
  <?php  echo $_GET['msg2'] ;?>
</div>

<div class="alert alert-success  mx-5" role="alert">
    <?php

        echo "RESTAURANT ID : $idf [ please note id is useful for modification ]";
    ?>
</div>

<div class="alert alert-success  mx-5 " role="alert">
    <?php
        echo "DATABASE NAME : $rname  ";
    ?>
</div>


<?php require('../footer.html'); ?>