<?php 
include 'lib/db.php';
//show product
if(isset($_GET['product_id'])){

    $allProd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON' AND id = '".$_GET['product_id']."'  ORDER BY `product`.`id` DESC LIMIT 16 ");
      if(mysqli_num_rows($allProd)>0){
       $product = mysqli_fetch_assoc($allProd);
          $prd_id = $product['id'];
          $prd_cat = $product['category'];
     }
    $pid = $_GET['product_id'];
}

  /// reviews count 
    $recuntSQL = mysqli_query($conn, "SELECT * FROM tbl_review WHERE pid = '$pid' ");
    $total_review = mysqli_num_rows($recuntSQL);
        if($total_review>0){
    $sumReviews = mysqli_query($conn, "SELECT SUM(ret) FROM `tbl_review`  WHERE pid = '$pid' ");
    $SumReviwsrow = mysqli_fetch_array($sumReviews);
    $total_Sum_reviews_erning = array_shift($SumReviwsrow);
    
    $avg_Reviews = ceil($total_Sum_reviews_erning/$total_review);
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Basic page needs -->
<meta charset="utf-8">
<!--[if IE]>
<?php include 'inc/meta.php';?>

<!-- Mobile specific metas  -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon  -->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<!-- CSS Style -->

<link rel="stylesheet" href="style.css">
</head>

<body class="shop_grid_page">
<?php include 'inc/mobile-menu.php';?>
<!-- end mobile menu -->
<div id="page"> 
  
  <!-- Header -->
  <header>
<div class="header-container">
<?php include 'inc/top-menu.php';?>    
      <!-- header inner -->
<?php include 'inc/main-menu.php';?>  
    </div>
  </header>
  <!-- end header -->
<?php include'inc/category.php';?>
  <!-- Breadcrumbs -->
  <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a> 
  
  <!-- End Footer --> 
</div>
<div id="quick_view_popup-overlay"></div>
<div style="display: block;" id="quick_view_popup-wrap">
  <div id="quick_view_popup-outer">
    <div id="quick_view_popup-content">
      <div style="width:auto;height:auto;overflow: auto;position:relative;">
        <div class="product-view-area">
          <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
            <?php 
                 if($product['Selling_Product'] != 'NO'){
                    echo '<div class="icon-sale-label sale-left">'.$product['Selling_Product'].'</div>';
                }
                if($product['Reted_Product'] != 'NO'){
                     echo '<div class="icon-new-label sale-right">'.$product['Reted_Product'].'</div>';
                 }?>
            <div class="large-image">  <a href="admin/images/product/fetcher-product/<?php echo $product['fetcher_img']?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img class="zoom-img" src="admin/images/product/fetcher-product/<?php echo $product['fetcher_img']?>" alt="products"> </a> </div>
            <div class="flexslider flexslider-thumb">
             
                <ul class="previews-list slides">
                  <li><a href='admin/images/product/fetcher-product/<?php echo $product['fetcher_img']?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'admin/images/product/fetcher-product/<?php echo $product['fetcher_img']?>' "><img src="admin/images/product/fetcher-product/<?php echo $product['fetcher_img']?>" alt = "Thumbnail 2"/></a></li>
                  <li><a href='admin/images/product/product-img/<?php echo $product['prod1'];?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'admin/images/product/product-img/<?php echo $product['prod1'];?>' "><img src="admin/images/product/product-img/<?php echo $product['prod1'];?>" alt = "Thumbnail 1"/></a></li>
                  
                  <li><a href='admin/images/product/product-img/<?php echo $product['prod2'];?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'admin/images/product/product-img/<?php echo $product['prod2'];?>' "><img src="admin/images/product/product-img/<?php echo $product['prod2'];?>" alt = "Thumbnail 1"/></a></li>
                  
                  
                  <li><a href='admin/images/product/product-img/<?php echo $product['prod3'];?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'admin/images/product/product-img/<?php echo $product['prod3'];?>' "><img src="admin/images/product/product-img/<?php echo $product['prod3'];?>" alt = "Thumbnail 1"/></a></li>
                  
                   <li><a href='admin/images/product/product-img/<?php echo $product['prod4'];?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'admin/images/product/product-img/<?php echo $product['prod4'];?>' "><img src="admin/images/product/product-img/<?php echo $product['prod4'];?>" alt = "Thumbnail 1"/></a></li>
                  
                 
                </ul>
            </div>
            
            <!-- end: more-images --> 
            
          </div>
          <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7">
            <div class="product-details-area">
              <div class="product-name">
                <h1><?php echo $product['name'];?></h1>
              </div>
                 <div class="price-box">
                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price">৳ <?php echo $product['sPrice'];?> </span> </p>
                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">৳ <?php echo $product['oPrice'];?>  </span> </p>
              </div>
             <div class="ratings">
                <div class="rating">  <?php
                   if($avg_Reviews == '1'){
                       echo '<i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i> 
                            <i class="fa fa-star-o"></i> 
                            <i class="fa fa-star-o"></i> 
                            <i class="fa fa-star-o"></i>
                       ';
                   }elseif($avg_Reviews == '2'){
                       echo '<i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star-o"></i> 
                            <i class="fa fa-star-o"></i> 
                            <i class="fa fa-star-o"></i>
                       ';
                   }elseif($avg_Reviews == '3'){
                       echo '<i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star-o"></i> 
                            <i class="fa fa-star-o"></i>
                       ';
                   }elseif($avg_Reviews == '4'){
                       echo '<i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star-o"></i>
                       ';
                   }elseif($avg_Reviews == '5'){
                       echo '<i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i>
                       ';
                   }
                   ?> </div>
                <p class="rating-links"> <a href="#"><?= $total_review;?> Review(s)</a> </p>
                <p class="availability in-stock pull-right">Availability: 
                 <?php 
                 if($product['Stock'] == 'In Stock'){
                    echo '<span class="able"> In Stock</span></p>';
                }else{
                     echo '<span class="unabe">Out Of Stock</span></p>';
                 }
               ?>
                
                
              </div>
             <div class="short-description">
                <h2>Quick Overview</h2>
                <p><?php echo $product['short_des'];?></p>
              </div>
              
              
             
            </div>
          </div>
        </div>
        <!--product-view--> 
        
      </div>
    </div>
    <a style="display: inline;" id="quick_view_popup-close" href="shop.php"><i class="icon pe-7s-close"></i></a> </div>
</div>
<?php include 'inc/footer.php';?>