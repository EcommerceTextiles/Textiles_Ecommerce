<?php
 include_once 'login_cart.php';
if(!isset($_SESSION['success'])){
 header("location:login.php");}
 

 
 else{
		  
include("connection.php");
$temp = sprintf($_SESSION['success']);


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
	
	$result = mysqli_query($con,"select c.subcategory_id,c.quantity,c.unit_price,c.category_id,c.total_price,c_name,image,c.customer_id from cart c,customer cs ,category ct where email='$temp' and cs.customer_id=c.customer_id and ct.subcategory_id=c.subcategory_id");
	if($result->num_rows > 0){
		while($row = mysqli_fetch_assoc($result)){?>
					<tr>
				   <td
                        <div class="col-md-5">
                        <div class="media">
                        
						<img class="media-object" src="<?php echo $row['image'];?>" style="width: 72px; height: 72px;"> </a>

                               
								<h5 class="media-heading"> by <a href="#">Brand name</a></h5>
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
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><?php echo $sum;?></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default" onclick="Javascript:window.location.href = 'index1.php'">
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
	  <?php }?>