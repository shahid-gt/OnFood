<?php
 require('top.php'); 


 if(isset($_GET['id'])&&($_GET['type']=='deactive')){
     $id=$_GET['id'];
     $sql1 = "update food set status=0 where fid='$id'";
     mysqli_query($con,$sql1);
 }
 else if(isset($_GET['id'])&&($_GET['type']=='active')){
    $id=$_GET['id'];
    $sql1 = "update food set status=1 where fid='$id'";
    mysqli_query($con,$sql1);
  }
  else if(isset($_GET['id'])&& $_GET['type']=='delete'){
    $id=$_GET['id'];
    $sql1 = "delete from food where fid = '$id'";
    mysqli_query($con,$sql1);
  }
 $sql = "select food.*,category.catname from food,category where food.catid=category.catid order by food.fid";
 $res = mysqli_query($con,$sql) ;
?>

<button id="submit" class="btn-outline-dark" onclick="window.location.href = 'addfood.php'">
    Add Food
  </button>

<table class="table table-striped" style="width:100%">

    <tr>
        <th>sr.no.</th>
        <th>foodid</th>
        <th>food_name</th>
        <th>category</th>
        <th>detail</th>
        <th>status</th>
        <th>price</th>
        <th>rating</th>
        <th>image</th>
    
  </tr>
<?php $i=1 ;
 while($row = mysqli_fetch_assoc($res) ) {
?>
  
  <tr>
      <td><?php echo $i++ ?></td>
      <td><?php echo $row['fid'] ?></td>
      <td><?php echo $row['fname'] ?></td>
      <td><?php echo $row['catname'] ?></td>
      <td><?php echo $row['fdetail'] ?></td>
      <td><?php echo $row['status'] ?></td>
      <td><?php echo $row['price'] ?></td>
      <td><?php echo $row['rating'] ?></td>
      <td><img src="<?php echo SITE_FOOD_IMAGE.$row['image']?>"/></td>
      
     <?php $status = $row['status'];
      if($status==1) { ?>
      <td>
      <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href = '?id=<?php echo $row['fid']?>&type=deactive'">Disable</button>
      </td>
      <?php } else { ?>
      <td>
      <button type="button" class="btn btn-success btn-sm" onclick="window.location.href = '?id=<?php echo $row['fid']?>&type=active'">Active&nbsp&nbsp</button>
      </td>
      <?php } ?>
      
      <td>
      <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href = '?id=<?php echo $row['fid']?>&type=delete'">Delete</button>
      </td>
  </tr>
<?php } ?> 
</table>
<?php require('../footer.html') ; ?>