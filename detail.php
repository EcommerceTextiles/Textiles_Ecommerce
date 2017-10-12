<?php
include("connection.php");
include 'include/newhead.php';
$id=$_GET['id'];
if(empty($_POST['Number'])) {
		$error_message = "Enter Quantity";
		}

    if(!isset($error_message))
    	{
    		if(!preg_match($_POST['Number'],FILTER_VALIDATE_INT))
    			$error_message = "Invalid number";
    		$no=$_POST['Number'];
    		$res= mysqli_query($con,"select quantity from category where subcat_id='$id'");
        $row=mysqli_fetch_array($res);
          $quantity=$row['quantity'];
        $newno=$quantity-$no;
        if($quantity<$no)
        {
          $error_message = "Cannot order over available quantity";
        }

        if($newno<10)
        {
          $error_message = "Current product not available in stock";
        }

    	}

if(!isset($error_message)) {
header("location:new_cart.php");
}




$storename=Array();
$catdesc=Array();
$qty=Array();
$catname=Array();
$subcat=Array();
$query="select * from category where subcategory_id='$id'";
$sql=mysqli_query($con,$query);
while($row=mysqli_fetch_array($sql))
{
  $imgname=$row['image'];
  $subcat=$row['subcat_name'];
  $prices=$row['sell_price'];
  $catdesc=$row['category_desc'];
    $qty=$row['quantity'];
  }

$query1=" select category_name from category, main_category where main_category.category_id=category.category_id and subcategory_id='$id';";
$sql1=mysqli_query($con,$query1);
while($row=mysqli_fetch_array($sql1))
{
  $catname=$row['category_name'];
}

 ?>


 <!DOCTYPE html>
 <html lang="en">
   <head>
   </head>
   <body>
     <form name="frmRegistration" method="post" action="">
<table border="0" width="500" align="center" class="demo-table">
       <?php if(!empty($error_message)) { ?>
  <div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
  <?php } ?>

     <table>
       <tr>
       <th rowspan="8"><img src="<?php echo $imgname?>" height="170" width="170">:</th>
       <td><?=$subcat ?></td>
     </tr>
     <tr>
       <td></td>
     </tr>
     <tr>
       <td></td>
     </tr>

     <tr>
       <td><?=$catdesc ?></td>
     </tr>
     <tr>
       <td></td>
     </tr>

     <tr>
       <td><input type="text" class="demoInputBox" name="Number" value="<?php if(isset($_POST['Number'])) echo $_POST['Number']; ?>">  </td>
     </tr>

     <tr>
       <td> <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart" ></span><a href="cart_demo.php"?id=<?=$id ?>>Add To Cart</a></button></td>
     </tr>


   </table>
 </form>
  </body>
 </html>
