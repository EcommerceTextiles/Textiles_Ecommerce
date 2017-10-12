<?php
require_once("connection.php");
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}	
			$e=$_POST['email'];
			$res= mysqli_query($con,"select email from customer where email='$e'");
		$rows = mysqli_num_rows($res);
		if ($rows <> 0) 
			$error_message="email already used";
		
	}
	/* number validate*/
	if(!isset($error_message))
	{	
		if(!preg_match("/^[0-9]{10}$/",$_POST['Number']))
			$error_message = "Invalid number";
		$no=$_POST['Number'];
		$res= mysqli_query($con,"select Number from customer where Number='$no'");
		$rows = mysqli_num_rows($res);
		if ($rows <> 0) 
			$error_message="number already used";
		
	}
			

	/* Validation to check if gender is selected */
	

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($error_message)) {
		if(!isset($_POST["terms"])) {
		$error_message = "Accept Terms and Conditions to Register";
		}
	}

	if(!isset($error_message)) {
		
		//$db_handle = new DBController();
		
		$result = mysqli_query($con,"INSERT INTO customer (c_name,Number,email, password) VALUES
		('" . $_POST["c_name"] . "', '" . $_POST["Number"] . "', '" . $_POST["email"] . "', '" . $_POST["password"] . "')");
		//$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
			header("location:login.php");
			unset($_POST);
		} else {
			$error_message = "Problem in registration. Try Again!";	
		}
		
	}
}
?>
<html>
<head>
<title>PHP User Registration Form</title>
<style>
body{
	width:610px;
	font-family:calibri;
}
.error-message {
	padding: 7px 10px;
	width: 80%;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 2px;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}
.demo-table {
	background: white;
	
	border-spacing: 20px;
	margin: 4px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 2em;
	color: black;
	border-radius: 10px;
	padding: 20px 40px;
}
.demo-table td {
	padding: 15px 0px;
	height:25px;
	width:300px;
	font-size:15pt;
}
.demoInputBox {
	padding: 10px 40px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
	margin-left: 10px;
	height:30px;
	width:220px;
	font-size:15pt;
	
}
.btnRegister {
	padding: 10px 30px;
	background-color: #8585AD;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 20px;
}

</style>
</head>
<body>
<form name="frmRegistration" method="post" action="">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>User Name</td>
<td><input type="text" class="demoInputBox" name="c_name" value="<?php if(isset($_POST['c_name'])) echo $_POST['c_name']; ?>"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" class="demoInputBox" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"></td>

</tr>
<tr>
<td>Number</td>
<td><input type="text" class="demoInputBox" name="Number" value="<?php if(isset($_POST['Number'])) echo $_POST['Number']; ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="demoInputBox" name="password" value=""></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
</tr>


<tr>
<td colspan=2>
<input type="checkbox" name="terms"> I accept Terms and Conditions <br><input type="submit" name="register-user" value="Register" class="btnRegister"></td>
</tr>
</table>
</form>
</body></html>