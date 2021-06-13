<?php 
require('top.php') ; 
$sql = "select * from category " ;
$res = mysqli_query($con , $sql) ;



if(isset($_GET['id'])){
    $id = $_GET['id'] ;
    mysqli_query($con , "delete from category where catid='$id'");
    redirect('category.php');
}

?>

<button id="submit" class="btn-outline-dark" onclick="window.location.href = 'addcat.php'">
    Add Category
  </button>

<table class="table table-dark table-striped" style="width:40%">

    <tr>
        <th>sr.no.</th>
        <th>cat_id</th>
        <th>cat_name</th>
    
  </tr>
<?php $i=1 ;
 while($row = mysqli_fetch_assoc($res) ) {
?>
  
  <tr>
      <td><?php echo $i++ ?></td>
      <td><?php echo $row['catid'] ?></td>
      <td><?php echo $row['catname'] ?></td>
      <td><button type="button" onclick="window.location.href = '?id=<?php echo $row['catid']?> &type=delete'"class="btn btn-danger">delete</button></td>
        
  </tr>
<?php } ?> 
</table>
<?php require('../footer.html')?>