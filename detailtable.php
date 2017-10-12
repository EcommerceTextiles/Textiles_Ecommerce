<?php
SESSION_START();
include("connection.php");
include 'include/newhead.php';
include 'include/navigation.php';
if(isset($_GET['id']) && !empty($_GET['id']))
    {
      $_SESSION['newid']=$_GET['id'];
      $_SESSION['fixval']=1;

    }
if(isset($_GET['plus']) && !empty($_GET['plus']))
    {
        $id=  $_SESSION['newid'];
        $q="select quantity from category where subcategory_id='$id'";
        $sql=mysqli_query($con,$q);
        $row=mysqli_fetch_array($sql);
        $qval=$row['quantity'];

        if($_SESSION['fixval']<$qval)
        {
          $_SESSION['fixval']=$_SESSION['fixval']+1;
        }
    }

    if(isset($_GET['minus']) && !empty($_GET['minus']))
        {
            if($_SESSION['fixval']>1)
            {
              $_SESSION['fixval']=$_SESSION['fixval']-1;
            }
        }

$id=$_SESSION['newid'];
$storename=Array();
$query="select * from category where subcategory_id='$id'";
$sql=mysqli_query($con,$query);
$row=mysqli_fetch_array($sql);
  $imgname=$row['image'];
  $subcat=$row['subcat_name'];
  $prices=$row['sell_price'];
  $catdesc=$row['category_desc'];
    $qty=$row['quantity'];

$query1=" select category_name from category, main_category where main_category.category_id=category.category_id and subcategory_id='$id';";
$sql1=mysqli_query($con,$query1);
$row=mysqli_fetch_array($sql1);
  $catname=$row['category_name'];

$query2="select category_id from category where subcategory_id='$id'";
$sql2=mysqli_query($con,$query2);
$row=mysqli_fetch_array($sql2);
  $catid=$row['category_id'];

$query3="select image from category where category_id='$catid'";
$sql3=mysqli_query($con,$query3);
while($row=mysqli_fetch_array($sql))
{
  $storename[]=$row['image'];
}

 ?>
<html>
<head>
</head>
<body>
  <div class="container-fluid">
    <div class="col-md-2"> </div>
 <form action="detailtable.php" method="post">
   <br>
    <br>
    <br>
  <table style="width:90%" align="right">
    <tr>
      <th><h1 align="right"><b>&emsp;&emsp;&emsp;&emsp;&emsp;<?=$subcat ?></b></th>
    </tr>
    <tr>
      <th rowspan="9"><div class="zoomImage"><img id="logo" src="<?=$imgname ?>" alt=""></img></div></th>
      <th colspan="2"></th>
      <td></td>
    <tr>
      <td><h4>Details</h4>
      <?=$catdesc ?></td>
    </tr>
    <tr>
      <td><hr></td>
    </tr>
    <tr>
      <td><h4>Price</h4> ₹<?php echo $prices; ?><hr></td>
    </tr>
    <tr>
      <td><h4>Quantity<h4></td>
    </tr>
    <tr>
      <td><a href="detailtable.php?plus=1" class="btn btn-xs-default"><span class="glyphicon glyphicon-plus"></span></a>
      <a href="#" class="btn btn-default btn-lg disabled" role="button" aria-disabled="true"><?=$_SESSION['fixval']; ?></a>
        <a href="detailtable.php?minus=1" class="btn btn-xs-default"><span class="glyphicon glyphicon-minus"></span></a></td>
    </tr>
    <tr>
      <td><hr></td>
    </tr>
    <tr>
    
      
<?php if(!empty($_SESSION['success'])){?>
	<td><a href="cart_demo.php?id=<?php echo $id;?>&cd=<?php echo $_SESSION['fixval'];?>" class="btn btn-info" role="button">Add To Cart <span class="glyphicon glyphicon-shopping-cart"></span></a> &nbsp; &nbsp; &nbsp;
	  <button type="button" class="btn btn-default" onclick="Javascript:window.location.href = 'index2.php'">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
</button><?php } else {?>
<td><a href="login.php" class="btn btn-info" role="button">Add To Cart <span class="glyphicon glyphicon-shopping-cart"></span></a> &nbsp; &nbsp; &nbsp;
<button type="button" class="btn btn-default" onclick="Javascript:window.location.href = 'index1.php'">
<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</button><?php }?>

</td>
    </tr>
    <tr>
      <td></td>
    </tr>
  </table>
</form>
<div class="col-md-2"><br></div>
</div>

<footer class="text-center" id="footer">| <a href="#">Contact us</a> | <a href="#">Address</a> | &copy; Copyright 2017-2019 Textiles |</footer>

</body>
</html>
