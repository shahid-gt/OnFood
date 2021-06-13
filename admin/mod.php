<?php
require('top.php');

$ssuc = "";

if(isset($_POST['update']))
{
    $rid = $_POST['tid'];
    $reg = $_POST['reg'];
    $rname =$_POST['rname'];
    $radd = $_POST['address'];
    $stime = $_POST['stime'];
    $etime =$_POST['etime'];
    $phone = $_POST['phone'];
    $sql = "update restaurant set regno='$reg',rname='$rname',radd='$radd',stime='$stime',etime='$etime',mobile='$phone' where rid=$rid ";

    if($con->query($sql) == true ){
        $ssuc = "Restaurant information updated Successfully " ;
    }
    else{
        echo " Error : $sql <br> $con->error " ;
    }


    $con->close();
}
//write the sql query for fetching the data appropriate the rname 
if(!isset($_POST['tid'])){
    $rid = $_POST['rid'];
    $res = mysqli_query($con,"select * from restaurant where rid=$rid");
    $row = mysqli_fetch_assoc($res);
    $reg = $row['regno'];
    $rname = $row['rname'];
    $radd = $row['radd'];
    $stime = $row['stime'];
    $etime = $row['etime'];
    $phone = $row['mobile'];
}
?>
<img class="bg myfont2" src="image/i1.jpg">
<h1 class="myfont2">Update Restaurant registration details</h1>
<div class="center myfont2">
<form  method="POST">
        <table>
            <tr>
                <td>
                    <label id="st">restaurant registration number : </label>
                </td>
                <td>
                    <input id="st" type="text" size="50" name="reg" value="<?php echo $reg; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label id="st">restaurant name : </label>
                </td>
                <td>
                    <input id="st" type="textbox" size="50" name="rname" value="<?php echo $rname; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label id="st">restaurant address : </label>
                </td>
                <td>
                    <textarea id="st" name="address" rows="3" cols="52" ><?php echo $radd ; ?></textarea>
                </td>

            </tr>
            <tr>
                <td>
                    <label id="st">Online service timing  : </label>
                </td>
                <td>
                    <label id="st">Start timing </label>
                    <input id="st" name="stime" type="time" value="<?php echo $stime ; ?>" >
                </td>
            </tr>        
                    
            <tr>
                <td></td>
                <td>
                    <label id="st">End timing&nbsp&nbsp</label>
                    <input id="st" type="time" name="etime" value="<?php echo $etime ; ?>">
                </td>
            <tr>
            <tr>
                <td>
                    <label id="st">Restaurant helpline number : </label>
                </td>
                <td>
                    <input id="st" type="phone" size="50" name="phone" value="<?php echo $phone ; ?>">
                </td>
            </tr>

                     
        </table>
</div>
        <div class="btn">
            <input type="submit" id="update" name="update" value="UPDATE DATABASE">
        </div>
        <input type="text" name="tid" value="<?php echo $rid ; ?>" style="visibility : hidden " >
</form>
<?php if($ssuc){?>
<div class="alert alert-success my-5" role="alert">
    <?php echo $ssuc ; ?>
</div> 
<?php } 
?>


<?php require('../footer.html'); ?>