<?php
if(isset($_POST['submit']))
{
	include_once 'connectdb.php';
	$first=mysqli_real_escape_string($connect,$_POST['first']);
	$username=mysqli_real_escape_string($connect,$_POST['username']);
	$password=mysqli_real_escape_string($connect,$_POST['password']);
	$email=mysqli_real_escape_string($connect,$_POST['email']);

	if(empty($first)||empty($username)||empty($password)||empty($email))
	{
		header("Location: /login_system/index.php?signup=empty");
		exit();
	}
	else
	{
		if(!preg_match("/^[a-zA-Z]*$/", $first))
		{
			header("Location: /login_system/index.php?signup=invalidfirst");
			exit();
		}
		else
		{
			if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				header("Location: /login_system/index.php?signup=email");
				exit();
			}
			else
			{
				$sql="SELECT * FROM users WHERE username='$username'";
				$result=mysqli_query($connect,$sql);
				$row=mysqli_num_rows($result);
				if($row>0)
				{
					header("Location: /login_system/index.php?signup=usernametakken");
					exit();
				}
				else
				{		
					//$pwdhashed=password_hash($password, PASSWORD_DEFAULT);
					$sql1="INSERT INTO users (fname,username,password,email) values ('$first','$username','$password','$email');"; mysqli_query($connect, $sql1);
					header("Location: /login_system/index.php?signup=success");
					exit();
				}
			}
		}
	}
	while($rowi=mysqli_fetch_assoc($result))
	{
		$rowimg=$rowi['username'];
		$sql="INSERT into proimg(userid) values($rowimg)";
		header("Location: /home.php");
	}
}
elseif (isset($_POST['logined'])) {
	header("Location: /login_system/login.php");
}
else
{
	header("Location: /login_system/index.php");
	exit();
}
?>