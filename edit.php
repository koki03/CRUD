<?php
include_once 'config.php';

//var_dump($_POST);

if(isset($_POST['edtId']))
{
  
		$name=$_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];

    $user=ORM::for_table('users')->where('id',$_POST['edtId'])->find_one();
    //var_dump($user);
   
	
$user->set(array('name'=>$name,'email'=> $email,'mobile'=>$mobile));
	echo $user->save();
	//header("location:index.php");
    //$users->set(array('first_name'=>$first_name ,'last_name'=>$last_name, 'user_city'=>$city_name));


    
  



  
}