 <?php

include 'server_admin.php';
?>    
<!DOCTYPE html>
<html>
<head>
<title>Admin Login </title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">

<div id="login">
<h2>Admin Login Form</h2>
<form action="" method="post">
<label>Email :</label>
<input id="name" name="email" placeholder="email" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<br>
<input name="submit" type="submit" value=" Login " onclick="Javascript:window.location.href='admin_boo1.php'">

</form>
</div>
</div>
</body>
</html>

