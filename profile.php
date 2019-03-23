<?php
while ($r=mysqli_fetch_assoc($result)) {
	$userid=$r['username'];
	$sql1="SELECT * from proimg where userid='$userid'";
	$resultimg=mysqli_query($connect,$sql1);
	$rowimg=mysqli_fetch_assoc($resultimg);
	while ($rowimg=mysqli_fetch_assoc($resultimg)) {
		echo"<div>";
		echo"<img src='/uploads/upload/profile".$userid."jpg'>";
		echo "</div>";
		}
	}
?>
