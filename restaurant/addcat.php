<?php
require('top.php') ;
if(isset($_POST['submit'])){
$cid = $_POST['cid'];
$cname=$_POST['cname'];
mysqli_query($con , "insert into category values('$cid','$cname')" );
redirect('category.php');
}

?> 

<img class="bg myfont2" src="image/i1.jpg">
<h1 class="myfont2">Register Category</h1>
<div class="center myfont2">
<form  method="POST">
        <table>
        <tr>
                <td>
                    <label id="st">Enter the category id : </label>
                </td>
                <td>
                    <input id="st" type="textbox" size="50" name="cid">
                </td>
        </tr>
        <tr>
                <td>
                    <label id="st">Enter the category Name : </label>
                </td>
                <td>
                    <input id="caname" type="text" size="50" name="cname">
                </td>
        </tr>
              
        </table>
</div>
        <div class="btn">
            <input type="submit" id="submit" name="submit" value="Register Category">
        </div>
</form>
<?php require('../footer.html'); ?>