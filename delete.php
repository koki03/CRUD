


<?php
include_once 'config.php';

// delete condition
if(isset($_POST['delete_id']))
{
 

  $users = ORM::for_table('users')->where('id',$_POST['delete_id'])->find_one();
  $users ->delete();


}

?>  