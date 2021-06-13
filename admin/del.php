<?php
require('top.php');
$rname = "";
$ssuc = "";
$dsuc = "";
if(isset($_POST['submit']))
{
   
    $rname =$_POST['rname'];
   
    $sql="DROP DATABASE $rname";

    if($con->query($sql) == true ){
        $suc = "DATABASE $rname DELETED SUCCESSFULLY" ;
    }
    else{
        echo " Error : $sql <br> $con->error " ;
    }

    $sql = "DELETE FROM restaurant WHERE rname = '$rname'";
    if($con->query($sql)==true){
        $dsuc="query deleted Successfully ";
    }
    else{
        echo " Error : $sql --> $con->error ";
    }

    $con->close();
}
?>
<img class="bg myfont2" src="image/i1.jpg">
<h1 class="myfont2">Delete Restaurant </h1>
<div class="center myfont2">
<form  method="POST">
        <table>
            
            <tr>
                <td>
                    <label id="st">Enter the restaurant name : </label>
                </td>
                <td>
                    <input id="st" type="textbox" size="50" name="rname">
                </td>
            </tr>
            

                     
        </table>
</div>
        <div class="btn">
            <input type="submit" id="submit" name="submit" value="DELETE DATABASE">
        </div>
</form>
<?php if($ssuc){?>
<div class="alert alert-success" role="alert">
    <?php echo $ssuc ; ?>
</div> 
<?php } 

if($dsuc) { ?>
<div class="alert alert-success" role="alert">
  <?php 
    echo $dsuc ;
    
?>
</div>
<div class="alert alert-success" role="alert">
    <?php
        echo "DATABASE NAME : $rname";
    ?>
</div>
<?php } ?>

<?php require('../footer.html'); ?>