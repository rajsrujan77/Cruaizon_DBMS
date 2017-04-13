<?php

	
	//mysql_select_db("travel");
	//if(isset()){
		session_start();
		$username = $_POST['user'];
		$email = $_POST['email'];
		$password = $_POST['pass'];
		$password2 = $_POST['pass2'];
		
		if($password == $password2)
		{
			$password = $password;
			$conn = oci_connect('cse_15101016','15101016','172.16.61.126/dbtest');
			if (!$conn) 
				{
					$e = oci_error();
					trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				}
			$sql = "INSERT INTO users(user_name,password,emailid) values('$username', '$password', '$email')";
			//$data ="SELECT * users";
			
			//echo $sql;
			$stid = oci_parse($conn, $sql);
			//echo $stid;
			
			$result=oci_execute($stid);
			//echo "<p>$result</p>";
			//echo $data;
			header("Location:../index-user.php?msg=successfully_logged_in");
			
			$_SESSION['user_name'] = ''.$username.'';
			
		}else
		{
			echo "Wrong password";
		}
		oci_close($conn);
			
	
?>
