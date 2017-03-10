
	
	<?php
	include_once("config.php");
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		
		// include database connection file
		
				
		// Insert user data into table
		//$result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile) VALUES('$name','$email','$mobile')");
		
		$insert=ORM::for_table('users')->create();
        $insert->name = $name;
		$insert->email = $email;
        $insert->mobile = $mobile;
		$insert->save();
        //header("location:index.php");


		
		// Show message when user added
		//echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>
