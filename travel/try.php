<?php 

session_start();
$username= $_POST['user'];
$password= $_POST['pass'];
//include("db_connect.php");
$conn = oci_connect('cse_15101016','15101016','172.16.61.126/dbtest');
if (!$conn) {
$e = oci_error();
trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$query= 'select * from users where user_name = \''.$username.'\' and password =\''.$password.'\'';
//echo $query;
$stid = oci_parse($conn, $query);
//echo $stid;
$result=oci_execute($stid);
//echo($result);

if(($row = oci_fetch_row($stid)) != false){


$username = $row[0];
header("Location:index-user.php?msg=successfully_logged_in");

//echo "<a href='member.php'>Click</a> here to enter"; 
$_SESSION['user_name'] = $username;
oci_close($conn);
}
else {
echo "Wrong Username or Password";
}

?>