
<?php
require_once 'connection.php';
 include 'include/head.php';
 include 'include/loggednav.php';
 include 'include/headerfull.php';
 include 'include/leftbar.php';

 $sql= "select * from category where featured = 1;";
 $featured = $con->query($sql);


?>

<!--main content-->
<div class="col-md-8">Main
<div class="row">
<h2 class="text-center">Featured Products</h2>
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
   include 'include/footer.php';

 ?>
