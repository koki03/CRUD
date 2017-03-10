

 <thead>
  <tr>
      <th><button type="button" data-toggle="modal" class="btn btn-primary insert">ADD DATA HERE</button></th>
    </tr>
   <tr>
    <th><center><h3>Name</h3></center></th>
    <th><center><h3>Mobile</h3></center></th>
    <th><center><h3>Email</h3></center></th>
    <th><center><h3>Edit</h3></center></th>
    <th><center><h3>Delete</h3></center></th>
    
    </tr>
</thead>

<?php
include'config.php';



  $people=ORM::for_table('users')->find_many();
  foreach ($people as $users)
    {
    ?>
    <tr>
        <td><center><h4><?php echo $users->name; ?></h4></center></td>
        <td><center><h4><?php echo $users->mobile; ?></h4></center></td>
        <td><center><h4><?php echo $users->email; ?></h4></center></td>
     
        
      <td><span class="action"><center><button edit_id=<?php echo $users->id; ?> name=<?php echo $users->name; ?> email=<?php echo $users->email; ?> mobile=<?php echo $users->mobile; ?> data-toggle="modal" data-target="#confirm-edit" class="btn btn-info " id="edit">Edit</button></center></span> </td>
      <td><span class="action"><center><button delete_id=<?php echo $users->id ?> data-toggle="modal" data-target="#confirm-delete" class="btn btn-warning delete" >Delete</button></center></span> </td>     
        </tr>
    <?php
 }
 ?>