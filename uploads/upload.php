<?php
session_start();
include_once 'connectdb.php';
$id=$_SESSION['id'];
if(isset($_POST['upload']))  
{
	$file=$_FILES['file'];
	$fileName=$file['name'];
	$fileType=$file['type'];
	$fileTmp_name=$file['tmp_name'];
	$fileerror=$file['error'];
	$fileSize=$file['size'];

	$fileExt=explode('.',$fileName);
	$fileActualext=strtolower(end($fileExt));

	$extarray= array('jpg','jpeg','png','pdf');
	if (in_array($fileActualext, $extarray)) {
		if ($fileerror===0) {
			$filenewname="profile".$id.".".$fileActualext;
			$filedestination='C:/wamp64/www/login_system/uploads/'.$filenewname;
			move_uploaded_file($fileTmp_name, $filedestination);
			header("Location: /login_system/home.php?upload=success");
		}
		else
		{
			echo "something did'nt go well";
		}
	}
	else
	{
		echo "file can't be uploaed";
	}
}
else
{
	header("Location: /login_system/home.php?upload=error");
}
?>