<?php
//session_start();

include("connection.php");
include_once 'login_cart.php';
$temp = sprintf($_SESSION['success']); 
$id_1=$_GET['id'];
$no=$_GET['cd'];

echo $no;

$r=mysqli_query($con,"select customer_id from customer where email='$temp'");
$r1=mysqli_fetch_object($r);
$result=mysqli_query($con,'select * from category where subcategory_id='.$_GET['id']);
$row=mysqli_fetch_object($result);
$category_id=$row->category_id;
$c=sprintf($category_id);
$subcategory_id=$row->subcategory_id;
$quantity=$no;
$total_price=($quantity*$row->sell_price);

$unit_price=$row->sell_price;
$product_id=$row->product_id;
//$category_id=$id_1;
//$customer_id=$temp;
$cust_id=$r1->customer_id;


//start procedure for inc cart id
		$sql1='call inc_cart_id(@cid)';
		$stmt1=mysqli_query($con,$sql1);
		$sql2='select @cid as cat_id';
		$stmt2=mysqli_query($con,$sql2);
		$row=mysqli_fetch_array($stmt2);
		if($row)
		{	$row=$row['cat_id'];	
			
		}
//end procedure for cart id inc
//to check if same category product exist
$cat=mysqli_query($con,"select * from cart where subcategory_id='$subcategory_id' and customer_id='$r1->customer_id'");

$row1=mysqli_num_rows($cat);
echo $row1;
if($row1 <> 0)
{	//echo $q;
	$cat_result= mysqli_fetch_object($cat);
	$q=sprintf($cat_result->quantity+1);
	
	
	$total_p=($q*$cat_result->unit_price);
	$result=mysqli_query($con,"update cart set quantity='$q' where subcategory_id='$subcategory_id' and customer_id='$cust_id'");
	$result=mysqli_query($con,"update cart set  total_price='$total_p' where subcategory_id='$subcategory_id' and customer_id='$cust_id'");
}
else
{
$result1 = mysqli_query($con,"insert into cart(cart_id,customer_id,quantity,category_id,subcategory_id,product_id,unit_price,total_price)values('$row',$r1->customer_id,$quantity,$category_id,$subcategory_id,$product_id,$unit_price,$total_price)");

}


//end check
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   

    <style>
    .quantity{
    width: 100px;
    margin: 10px auto;
    }
    </style>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </head>
  <body>
  <?php $sum='';?>
  
    <div class="container">
    <div class="row">
        <div class="col-sm-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
				<?php 
	$temp = sprintf($_SESSION['success']); 
	
	$result = mysqli_query($con,"select subcat_name,c.subcategory_id,c.quantity,c.unit_price,c.category_id,c.total_price,c_name,image from cart c,customer cs ,category ct where email='$temp' and cs.customer_id=c.customer_id and ct.subcategory_id=c.subcategory_id");
	if($result->num_rows > 0){
		while($row = mysqli_fetch_assoc($result)){?>
					<tr>
				   <td
                        <div class="col-md-5">
                        <div class="media">
                        <!--    <a class="thumbnail pull-left" href="#">                             <div class="media-body"> -->
						<img class="media-object" src="<?php echo $row['image'];?>" style="width: 72px; height: 72px;"> </a>

                                <!--<h4 class="media-heading"></a></h4>-->
								<h5 class="media-heading"><?php echo $row['subcat_name'];?></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" class="form-control" id="quantity_id" value=<?php echo $row['quantity'];?> style="width:50px;">
                        </td>   
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $row['unit_price'];?></strong></td> 
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $row['total_price'];?></strong></td>
                        <td class="col-sm-1 col-md-1">
						
				
                        
						<a href="del.php?id=<?php echo $row['subcategory_id'];?>">REMOVE</a></td>
                    </tr>
	
      
          <?php $sum+= sprintf($row['total_price']);?>
		 
		  
			  
            
	<?php } }	?>				
                    
                </tbody>
                <tfoot>
					<tr>
                        <td ></td>
                        <td></td>
                        <td></td>
                        <td><h5>sub-total</h5></td>
						<td class="text-right"><h5><?php echo $sum;?></h5></td>
						
                        
                    </tr>
                    <tr><?php $tax=sprintf($sum*0.10);?>
                        <td ></td>
                        <td></td>
                        <td></td>
                        <td><h5>TAX</h5></td>
						<td class="text-right"><h5><?php echo $tax;?></h5></td>
						<?php $sum=$sum+$tax;?>
                        
                    </tr>
					<tr>
                        <td ></td>
                        <td></td>
                        <td></td>
                        <td><h3>Total</h3></td>
						
                        <td class="text-right"><h3><?php echo $sum;?></h3></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>  </td>
                        <td>  </td>
                        <td>
                        <button type="button" class="btn btn-default" onclick="Javascript:window.location.href = 'AllDetails.php?id=<?php echo $c;?>'">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success" onclick="Javascript:window.location.href='bill.php?id=<?php echo $temp;?>'">
                            BUY <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div> 

</body>
</html>