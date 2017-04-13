<?php
$a = $_POST['search'];

$conn = oci_connect('cse_15101016','15101016','172.16.61.126/dbtest');
if (!$conn) 
{
$e = oci_error();
trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} 
$sql = 'SELECT * FROM USERS WHERE CITY_NAME =\''.$a.'\'';
$stid = oci_parse($conn, $sql);
$result=oci_execute($stid);
if(($row = oci_fetch_row($stid)) != false)
{
//$username = $row[1];
echo "welcome!!";


//echo "<a href='member.php'>Click</a> here to enter"; 
//$_SESSION['user_name'] = ''.$username.'';
//echo "hjgjhgjy";
if($a=='LONDON')
{
echo "hihi";
}
else
{
echo "Sorry";
}
}
oci_close($conn);


?>