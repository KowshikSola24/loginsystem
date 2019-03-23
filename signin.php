<?php
session_start();
include_once 'connectdb.php';
if(isset($_POST['login']))
{
$user=mysqli_real_escape_string($connect,$_POST['uname']);
$password=mysqli_real_escape_string($connect,$_POST['pwd']);
if(empty($user)||empty($password))
{
	header("Location: /login_system/login.php?signin=empty");
	exit();
}
else
{
$sql="SELECT * from users where username='$user' and password='$password'";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)<1)
{
	header("Location: /login_system/login.php?signin=error");
	exit();
}
else
{
	$_SESSION['u_id']=$row['id'];
	$_SESSION['u_fname']=$row['fname'];
	$_SESSION['u_name']=$row['username'];
	$_SESSION['u_email']=$row['email'];
	header("Location: /login_system/home.php?signin=success");
	exit();
}
}
}?>
