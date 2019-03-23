<?php
session_start();
include_once 'connectdb.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	 $sql="SELECT * from users";
	 $result= mysqli_query($connect,$sql);
	 if(mysqli_num_rows($result)>0)
	 {
	 	while($row=mysqli_fetch_assoc($result))
	 	{
	 		$id=$row['id'];
	 		$sqlimg="SELECT * from proimg where userid='$id'";
	 		$resultimg=mysqli_query($connect,$sqlimg);
	 		while($rowimg=mysqli_fetch_assoc($resultimg))
	 		{
	 			echo"<div>";
	 			echo "<img src='uploads/profile".$id.".jpg'>";
	 			echo"</div>";

	 		}
	 	}
	 }
	?>
<form action="uploads/upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
	<button type="submit" name="upload">Upload</button>
	</form>
<form action="logout.php" method="POST">
	<button type="submit" name="logout">logout</button>
</form>
</body>
</html>