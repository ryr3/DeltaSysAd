<?php
include ('config.php');
$name=$_POST[name];
$password=$_POST[password];
$hashed=MD5($password);
$sql="SELECT * from users where name='$name' AND hashedpassword='$hashed';";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
   $count=mysqli_num_rows($result);
   if($count==1){
        echo 'Correct Password!';
        echo '<img src="'.$row['image'].'">';
    }
    else{
    	echo 'Wrong Password!';
    }
?>