<?php
include 'config.php';
$allowed=array_merge(range('A', 'Z'), range('a', 'z'), range('0','9'));
$password='';
for($i=0;$i<5;$i++){
	$password.=$allowed[rand(0,(count($allowed)-1))];
}
//echo $password;
$hashedpass=md5($password);
$sql="UPDATE users SET hashedpassword='$hashedpass' WHERE name='admin';";
$request=mysqli_query($db,$sql);
?>
