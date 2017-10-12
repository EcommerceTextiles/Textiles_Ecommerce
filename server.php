<?php
session_start(); // Starting Session
include("connection.php");
$error=array(); // Variable To Store Error Message
$_SESSION['success'] = "";

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error_message = "Username or Password is invalid";
//echo $error;
}
else
{
	$_SESSION['logged_in']=1;
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$query = mysqli_query($con,"select * from customer where password='$password' AND email='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1)
{

				$_SESSION['email'] = $email;
				$_SESSION['success'] =$username;
				if(!empty($_SESSION['cart']))
	            {
				header('location: cart_demo.php');
			     }
				 else
			    {
				header('location: index2.php');
		        	}

} else {
$error_message = "Username or Password is invalid";

}
mysqli_close($con); // Closing Connection
}
}
?>
