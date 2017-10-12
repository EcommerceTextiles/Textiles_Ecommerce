<html>
<head>
</head>
<body>

<?php

$nameE = $emailE = $websiteE = "";
$name = $email = $website = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if (empty($_POST["name"])) 
  {
    $nameE = "Enter name";
  }

if (empty($_POST["email"])) 
 {
    $emailE = "Email is required";
  } 
  else	
 {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

if (empty($_POST["website"])) {
    $website = "";
  } 
 else 
  {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
   {
      $websiteE = "Invalid URL";
    }    
  }
}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameE;?></span>
  <br><br>

  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailE;?></span>
  <br><br>

  Website: <input type="text" name="website">
  <span class="error"><?php echo $websiteE;?></span>
  <br><br>
 <input type="submit" name="submit" value="Submit">  
</form>		
</body>
</html>	
















