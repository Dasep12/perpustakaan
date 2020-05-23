<?php
include 'koneksi.php';
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap-login.css">
<link rel="stylesheet" type="text/css" href="css/style-login.css">
</head>
<body>
<div class="sub-header">
	<h4>LOGIN FORM</h4>
</div>
	<div class="sub-body">
		<center><img src="img/index.png" ></center><br>
	<form action="login.php"  method="POST">
		<label>Username</label><input  placeholder="Enter Username" required="" name="admin"  type="text" class="form-control-1">
		<label>Password</label><input placeholder="Enter Password" type="password" name="pass" class="form-control-1">
		<input type="submit" name="masuk" class="btn btn-info" value="Login">
		<input type="checkbox"><span> Ingat Saya</span>
	</form>
	</div>

</body>
</html>