<?php 
    include('top.php');

    $res = mysqli_query($con,"select * from contact_us ");
?>


<table class="table table-striped" style="width:100%">

    <tr>
        <th>sr.no.</th>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Time</th>
    
  </tr>
<?php $i=1 ;
 while($row = mysqli_fetch_assoc($res) ) {
?>
  
  <tr>
      <td><?php echo $i++ ?></td>
      <td><?php echo $row['cid'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['subject'] ?></td>
      <td><?php echo $row['message'] ?></td>
      <td><?php echo $row['time'] ?></td>
    
  </tr>
<?php } ?> 
</table>



<?php require('../footer.html') ?>