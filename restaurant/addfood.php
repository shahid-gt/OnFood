<?php
require('top.php');

$err_img = "";
if(isset($_POST['submit'])){
$fid = $_POST['fid'];
$fname=$_POST['fname'];
$catid=$_POST['category'];
$fdetail=$_POST['fdetail'];
$status = 1 ;
$price=$_POST['price'];
$rating=$_POST['rating'];


$type = $_FILES['image']['type'];
if($type!='image/jpeg' && $type!='image/png'){$err_img="invalid image format : ";}
else{
$image = rand(111111111,999999999).'_'.$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],SERVER_FOOD_IMAGE.$image);
mysqli_query($con , "insert into food values('$fid','$fname','$catid','$fdetail','$status','$price','$rating','$image')" );
redirect('food.php');}
}

$res=mysqli_query($con,"select * from category order by catname");

?> 

<img class="bg myfont2" src="image/i1.jpg">
<h1 class="myfont2">Register Food</h1>
<div class="center myfont2">
<form  method="POST" enctype="multipart/form-data">
        <table>
        <tr>
                <td>
                    <label id="st">Enter the food id : </label>
                </td>
                <td>
                    <input id="st" type="textbox" size="50" name="fid">
                </td>
        </tr>
        <tr>
                <td>
                    <label id="st">Enter the food Name : </label>
                </td>
                <td>
                    <input id="caname" type="text" size="50" name="fname" required>
                </td>
        </tr>
        
        <tr>
                <td>
                    <label id="st">Select the category : </label>
                </td>
                <td>
                    <select name="category">
                        <option></option>
                        <?php 
                            while($row=mysqli_fetch_assoc($res)){
                                echo "<option value='".$row['catid']."'>".$row['catname']."</option>";
                            }
                        ?>
                    </select>
                </td>
        </tr>
        <tr>
                <td>
                    <label id="st">Enter the food specification : </label>
                </td>
                <td>
                    <input id="caname" type="text" size="50" name="fdetail">
                </td>
        </tr>
        <tr>
                <td>
                    <label id="st">Enter the food price : </label>
                </td>
                <td>
                    <input id="caname" type="text" size="50" name="price">
                </td>
        </tr>
        <tr>
                <td>
                    <label id="st">Enter the food rating: </label>
                </td>
                <td>
                    <input id="caname" type="text" size="50" name="rating">
                </td>
        </tr>
        <tr>
            <td><label id="st">Upload the food image:</label>
            <td><input type="file" placeholder="food image" name="image" required></td>
        </tr>
              
        </table>
</div>
        <div class="btn">
            <input type="submit" id="submit" name="submit" value="Register Food">
        </div>
</form>
<h3 style="color:red" ><?php echo $err_img ?></h3>
<?php require('../footer.html'); ?>