<?php
$id=$_GET['id'];
require_once 'connection.php';
 include 'include/newhead.php';
 include 'include/newnav.php';
 include 'include/headerfull.php';
 include 'include/leftbar.php';

 $sql= "select * from category where category_id = '$id';";
 $featured = $con->query($sql);

 $query=" SELECT distinct (product_name), category_name from main_category,product where product.product_id=main_category.product_id and category_id='$id'";
 $sql=mysqli_query($con,$query);
 while($row=mysqli_fetch_array($sql))
 {
   $prodname=$row['product_name'];
   $catename=$row['category_name'];
 }



 ?>
 <div class="col-md-8">Main
 <div class="row">
   <br>
   <br>
 <h2 class="text-center"><?=$catename." ".$prodname?>   </h2>
 <?php while($category = mysqli_fetch_assoc($featured)) : ?>
 <div class="col-md-3 text-center">
 <h4><?= $category['subcat_name']; ?></h4>
 <img src="<?php echo $category['image'];?>" height="170" width="170">
 <p class="price">Price: ₹ <?php echo  $category['sell_price']; ?></p>
<a href="detailtable.php?id=<?php echo $category['subcategory_id']?>" class="btn btn-sm btn-success" role="button">Details</a>
  </div>
  <?php endwhile; ?>
   </div>
 </div>

 <?php

    include 'include/rightbar.php';

  ?>
