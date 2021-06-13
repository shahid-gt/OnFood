<?php

require('top.php');
if(!isset($_SESSION['LOGIN'])){
  redirect("../index.php");
  
}


 
?>


<img class="bg myfont2" src="image/i1.jpg">
<div class="center myfont2" >
  <h3 style="text-align: center;">Manage Restauratns</h3>

  <button id="submit" class="btn-outline-dark" onclick="window.location.href = 'add.php'">
    Add Restauratns
  </button>

  <form method="POST" action="mod.php">
    <input type="text" id="rid" name="rid" size="50" placeholder="Enter the restuarnt id to modify ">
    <input type="submit" id="submit" name="submit" value="MODIFY Restaurant">
  </form>



  <button id="submit" onclick="window.location.href = 'del.php'">
    DELETE Restauratns
  </button>



</div>

<?php require('../footer.html'); ?>