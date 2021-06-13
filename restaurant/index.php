<?php
 require('top.php'); 

 $sql = "select * from orders order by oid desc";
 $res = mysqli_query($con,$sql) ;
?>


<table class="table table-striped" style="width:100%">

    <tr>
        <th class="order_heading">sr.no.</th>
        <th class="order_heading">OrderId</th>
        <th class="order_heading">UserId_UserName</th>
        <th class="order_heading">Food Name</th>
        <th class="order_heading">Mobile</th>
        <th class="order_heading">Email</th>
        <th class="order_heading">Address</th>
        <th class="order_heading">time</th>
        
  </tr>
<?php $i=1 ;
 while($row = mysqli_fetch_assoc($res) ) {
?>
  
  <tr>
      <td class="order_row" width="2%"><?php echo $i++ ?></td>
      <td class="order_row" width="2%"><?php echo $row['oid']  ?></td>
      <td class="order_row" width="15%"><?php echo $row['user_id']."_".$row['name'] ?></td>
      <td class="order_row"><?php echo $row['fname'] ?></td>
      <td class="order_row" width="14%"><?php echo $row['mobile'] ?></td>
      <td class="order_row"><?php echo $row['email'] ?></td>
      <td class="order_row" width="30%"><?php echo $row['address']." ".$row['zipcode'] ?></td>
      <td class="order_row"><?php echo $row['time'] ?></td>
    </tr>
<?php } ?>
</table>
<?php require('../footer.html') ; ?>