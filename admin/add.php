<?php
require('top.php');
$dsuc = "";
$ssuc = "";
$rname = "";
$rid = "";
if(isset($_POST['submit']))
{
    $reg = $_POST['reg'];
    $rname =$_POST['rname'];
    $address = $_POST['address'];
    $stime = $_POST['stime'];
    $etime =$_POST['etime'];
    $phone = $_POST['phone'];
    $sql="INSERT INTO `restaurant` (`rid`, `regno`, `rname`, `radd`, `stime`, `etime`, `mobile`) VALUES (NULL,'$reg', '$rname', '$address', '$stime', '$etime', '$phone')";

    if($con->query($sql) == true ){
        $ssuc = "Restaurant information Registered Successfully " ;
    }
    else{
        echo " Error : $sql <br> $con->error " ;
    }

    $sql = "select rid from restaurant where rname = '$rname'";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);
    $rid = $row['rid']; 

    $sql = "CREATE DATABASE $rname";
    if($con->query($sql)==true){
        $ResCon = mysqli_connect($host,$username,$password,$rname);

        

        $sql1 = "CREATE TABLE category (
            catid VARCHAR(6)  PRIMARY KEY,
            catname VARCHAR(30) NOT NULL
        ) "; 

        $sql2 = "CREATE TABLE food (
            fid VARCHAR(6)  PRIMARY KEY,
            fname VARCHAR(30) NOT NULL,
            catid VARCHAR(6) NOT NULL ,
            fdetail VARCHAR(255) NOT NULL ,
            status BOOLEAN NOT NULL ,
            price DOUBLE NOT NULL ,
            rating INT NOT NULL , 
            image VARCHAR(255) NOT NULL 
        ) ";

        $sql3 = "CREATE TABLE orders(
            oid INT AUTO_INCREMENT PRIMARY KEY ,
            user_id INT NOT NULL,
            name VARCHAR(6) NOT NULL ,
            email VARCHAR(255) NOT NULL ,
            address VARCHAR(30) NOT NULL ,
            mobile  VARCHAR(30) NOT NULL ,
            zipcode VARCHAR(30) NOT NULL ,
            fname VARCHAR(30) NOT NULL,
            time VARCHAR(30) NOT NULL ,
            payment_mode VARCHAR(30) NOT NULL 
        ) "; 

        if($ResCon->query($sql1)==false){
            
            echo " Error : $sql1 --> $ResCon->error ";
        }

        if($ResCon->query($sql3)==false){
            
            echo " Error : $sql3 --> $ResCon->error ";
        }

        if($ResCon->query($sql2)==false){
            
            echo " Error : $sql2 --> $ResCon->error ";
        }
        

        $dsuc="Database created successfully ";

        redirect("password.php?id='$rid'&name='$rname'&msg1='$ssuc'&msg2='$dsuc'");

    }
    else{
        echo " Error : $sql --> $con->error ";
    }

    $con->close();
    $ResCon->close() ;
}
?>
<img class="bg myfont2" src="image/i1.jpg">
<h1 class="myfont2">Restaurant registration</h1>
<div class="center myfont2">
<form  method="POST">
        <table>
            <tr>
                <td>
                    <label id="st">Enter the restaurant registration number : </label>
                </td>
                <td>
                    <input id="st" type="text" size="50" name="reg">
                </td>
            </tr>
            <tr>
                <td>
                    <label id="st">Enter the restaurant name : </label>
                </td>
                <td>
                    <input id="st" type="textbox" size="50" name="rname">
                </td>
            </tr>
            <tr>
                <td>
                    <label id="st">Enter restaurant address : </label>
                </td>
                <td>
                    <textarea id="st" name="address" rows="3" cols="52"></textarea>
                </td>

            </tr>
            <tr>
                <td>
                    <label id="st">Online service timing  : </label>
                </td>
                <td>
                    <label id="st">Start timing </label>
                    <input id="st" name="stime" type="time" >
                </td>
            </tr>        
                    
            <tr>
                <td></td>
                <td>
                    <label id="st">End timing&nbsp&nbsp</label>
                    <input id="st" type="time" name="etime">
                </td>
            <tr>
            <tr>
                <td>
                    <label id="st">Restaurant helpline number : </label>
                </td>
                <td>
                    <input id="st" type="phone" size="50" name="phone">
                </td>
            </tr>

                     
        </table>
</div>
        <div class="btn">
            <input type="submit" id="submit" name="submit" value="CREATE DATABASE">
        </div>
</form>


<?php require('../footer.html'); ?>