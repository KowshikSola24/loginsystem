<?php
session_id();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="signin.php" method="POST">
	<input type="text" name="uname" placeholder="username"><br>
	<input type="password" name="pwd" placeholder="password"><br>
	<button type="submit" name="login">signin</button>
</form>
</body>
</html>