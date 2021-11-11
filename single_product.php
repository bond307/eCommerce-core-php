<?php include 'lib/db.php';
include 'function.php';

if(isset($_GET['product_id'])){
    $pid = $_GET['product_id'];
}
//show product
if(isset($_GET['search_result'])){
    $allProd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON' AND id = '".$_GET['search_result']."'  ORDER BY `product`.`id` DESC LIMIT 16 ");
      if(mysqli_num_rows($allProd)>0){
       $product = mysqli_fetch_assoc($allProd);
          $prd_id = $product['id'];
          $prd_cat = $product['category'];
     }
    
    $cat = mysqli_query($conn, "SELECT product.id, category.category, category.category from product, category where product.category = category.id and product.id = '$prd_id' ORDER BY category.id  ");
      if(mysqli_num_rows($cat)>0){
       $catP = mysqli_fetch_assoc($cat); 
         
     }
    $sub_cat = mysqli_query($conn, "SELECT product.id, sub_category.sub_category, sub_category.sub_category from product, sub_category where product.sub_category = sub_category.id and product.id = '$prd_id' ORDER BY sub_category.id  ");
      if(mysqli_num_rows($sub_cat)>0){
       $sub_catP = mysqli_fetch_assoc($sub_cat); 
         
     }
}elseif(isset($_GET['product_id'])){

    $allProd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON' AND id = '$pid'  ORDER BY `product`.`id` DESC LIMIT 16 ");
      if(mysqli_num_rows($allProd)>0){
       $product = mysqli_fetch_assoc($allProd);
          $prd_id = $product['id'];
          $prd_cat = $product['category'];
     }
    
    $cat = mysqli_query($conn, "SELECT product.id, category.category, category.category from product, category where product.category = category.id and product.id = '$prd_id' ORDER BY category.id  ");
      if(mysqli_num_rows($cat)>0){
       $catP = mysqli_fetch_assoc($cat); 
         
     }
    $sub_cat = mysqli_query($conn, "SELECT product.id, sub_category.sub_category, sub_category.sub_category from product, sub_category where product.sub_category = sub_category.id and product.id = '$prd_id' ORDER BY sub_category.id  ");
      if(mysqli_num_rows($sub_cat)>0){
       $sub_catP = mysqli_fetch_assoc($sub_cat); 
         
     }
    
    
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Basic page needs -->
<meta charset="utf-8">
  <?php include 'inc/meta.php';?>

<!-- Mobile specific metas  -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon  -->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<!-- CSS Style -->

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/single.css">
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
  <!---################################## Check ################## -->
<?php 
$addCart='';
$addCartReqst='';
if(isset($_SESSION['user_login']) && ($_SESSION['user_login'] == 'yes') && isset($_SESSION['id'])){
    $addCart = 'cart';
    $useri_id = $_SESSION['id'];
}else{
    $addCartReqst = 'data-toggle="modal" data-target="#login_requst"';
    echo '
<div class="modal fade modal-dialog-centered" id="login_requst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Please Login First</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="login.php" type="button" class="btn btn-success">Login</a>
        <a href="user_registration.php" style="margin-left:30px;" type="button" class="btn btn-primary">Registration Now</a>
      </div>
     
    </div>
  </div>
</div>';
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
<style>
.panel-heading {
	padding: 0;
}
    .panel-group .panel{
        border-color: transparent;
        border: 0;
    }
    .panel-group .panel-heading a{
        font-size: 14px;
    }
</style>  
  

  <div class="main-container col1-layout">
    <div class="container">
      <div class="row">
       <div id="msg"></div>
        <div class="col-main">
          <div class="product-view-area">
            <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
               <?php 
                 if($product['Selling_Product'] != 'NO'){
                    echo '<div class="icon-sale-label sale-left">'.$product['Selling_Product'].'</div>';
                }
                if($product['Reted_Product'] != 'NO'){
                     echo '<div class="icon-new-label sale-right">'.$product['Reted_Product'].'</div>';
                 }?>
              <div class="large-image" style="height: 570px;"> <a href="admin/images/product/fetcher-product/<?php echo $product['fetcher_img']?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img class="zoom-img" src="admin/images/product/fetcher-product/<?php echo $product['fetcher_img']?>" alt="products"> </a> </div>
              
              
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
             <form action="#" method="post" class="form">
            <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
              <div class="product-name">
                <h1><?php echo $product['name'];?></h1>
              </div>
              <div class="price-box">
                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price">৳ <?php echo $product['sPrice'];?> </span> </p>
                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">৳ <?php echo $product['oPrice'];?>  </span> </p>
              </div>
              <div class="ratings">
                <div class="rating"> 
                <?php
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
                   ?>
                 
                   </div>
                <p class="rating-links"> <a href="#"><?= $total_review;?> Review(s)</a> <span class="separator">|</span> <a href="#add_review">Add Your Review</a> </p>
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
              <?php 
                if($product['variarble'] == 'Variable product'){
                    ////fatcch all color form tbl_product
                    $chkVrbl = mysqli_query($conn, "SELECT * FROM `product` WHERE variarble = 'Variable product' AND id = '".$_GET['product_id']."' ");
                    $result = mysqli_fetch_assoc($chkVrbl);
                   $color = $result['color'];
                 
                 ?>
               <div class="product-color-size-area">
               <?php if($color_num>0){ ?>
                <div class="color-area">
                  <h2 class="saider-bar-title">Color</h2>
                  <div class="color">
                    <ul>
                     <?php 
                        //Using the explode method
                        $get_colot = explode("-",$color);

                        //foreach loop to display the returned array
                        foreach($get_colot as $code){
                     ?>
                     
                      <li>
                         <label class="color-fild">
                          <input value="<?= $code; ?>" class="color" type="checkbox">
                          <span style="background-color: <?= $code; ?>;" class="checkmark"></span>
                         </label>
                      </li>
                 <?php }?>
                      
                    </ul>
                  </div>
                </div>
              <?php }?>
               
               
                <?php if($siz_num>0){ ?>
                <div class="size-area">
                  <h2 class="saider-bar-title">Size</h2>
                  <div class="size">
                    <ul style="margin-top: -12px;">
                      <?php 
                      ////fatcch all color form tbl_product
                    $chkVrbls = mysqli_query($conn, "SELECT * FROM `product` WHERE variarble = 'Variable product' AND id = '".$_GET['product_id']."' ");
                    $resultS = mysqli_fetch_assoc($chkVrbls);
                         $size = $resultS['size'];
                            $sizeGet = explode("-",$size);
                            foreach($sizeGet as $getS){
                        ?>
                      <li>
                      <label class="size-fild">
                      <input value="<?= $getS;?>" class="size" type="checkbox" id="myCheck">
                      <span style=" " class="checkmark"></span><?= $getS;?>
                      </label>
                      </li>
                       <?php } ?>
                      
                    </ul>
                  </div>
                </div>
                <?php }?>
              </div>
                <?php } ?>
              <div class="product-variation">
               
                  <div class="cart-plus-minus">
                    <label for="qty">Quantity:</label>
                    <div class="numbers-row">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                      <input type="text" class="qty Qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                    </div>
                  </div>
                    <input type="hidden" class="pid" value="<?php echo $product['id']?>">
              <input type="hidden" class="pname" value="<?php echo $product['name']?>">
              <input type="hidden" class="pprice" value="<?php echo $product['sPrice']?>">
              <input type="hidden" class="pimg" value="<?php echo $product['fetcher_img']?>">
              <input type="hidden" class="ppinvoice" value="<?php echo $product['invoice']?>">
              <input type="hidden" class="user_id" value="<?php echo $useri_id;?>">
                  
                  
                  
                  <button <?php echo $addCartReqst;?>  class="button pro-add-to-cart <?= $addCart;?>" title="Add to " type="button"><span><i class="fa fa-shopping-basket"></i> Add to Cart</span></button>
                  
                  
                  
               
              </div>
             
              <div class="pro-tags">
                <div class="pro-tags-title">Category:</div>
                  <a><?php echo  $catP['category'];?></a>  <a style="color:red" ><?php echo '>'. $sub_catP['sub_category'];?></a>
              <!----<div class="share-box">
                <div class="title">Share in social media</div>
                <div class="socials-box"> 
                <a href="#" class="facebook-btn"><i class="fa fa-facebook"></i></a>
                   <a href="#" class="instagram-btn"><i class="fa fa-whatsapp"></i></a>
                    <a href="#" class="whatsapp-btn"><i class="fa fa-instagram"></i></a> </div>
              </div>----->
            </div>
          </div>
           </form>
        </div>
           
               
        <div class="product-overview-tab" id="add_review">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="product-tab-inner">
                  <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                    <li class="active"> <a href="#description" data-toggle="tab"> Description </a> </li>
                    <li> <a href="#reviews" data-toggle="tab">Reviews</a> </li>
                  </ul>
                  <div id="productTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="description">
                      <div class="std">
                       <p><?php echo nl2br($product['des'])?></p>
                      </div>
                    </div>
                    <div id="reviews" class="tab-pane fade">
                      <div class="col-sm-5 col-lg-5 col-md-5">
                        <div class="reviews-content-left">
                          <h2>Customer Reviews</h2>
                          <?php 
                            $reShow = mysqli_query($conn, "SELECT * FROM tbl_review WHERE pid = '$pid' ");
                           if(mysqli_num_rows($reShow)>0){
                          while($rowRev = mysqli_fetch_assoc($reShow)){
                           
                            ?>
                          <div class="review-ratting">
                            <p>Review by <a><?= $rowRev['nick']?></a> </p>
                           <div class="rating"> 
                           <?php
                               if($rowRev['ret'] == '1'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i>
                                   ';
                               }elseif($rowRev['ret'] == '2'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i>
                                   ';
                               }elseif($rowRev['ret'] == '3'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i>
                                   ';
                               }elseif($rowRev['ret'] == '4'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i>
                                   ';
                               }elseif($rowRev['ret'] == '5'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i>
                                   ';
                               }
                               ?>
                            
                       </div>
                           
                            <p class="author"><small> (Posted on <?= $rowRev['date']?>)</small> </p>
                          </div>
                          <?php } }?>
                        </div>
                      </div>
                      <div class="col-sm-7 col-lg-7 col-md-7">
                        <div class="reviews-content-right">
                          <h2>Write Your Own Review</h2>
                          <?php 
                            if(isset($_POST['submit'])){
                                $pid = $_GET['product_id'];
                                $ret = implode($_POST['rating']);
                                $Nick = $_POST['Nickname'];
                                $Sum = mysqli_real_escape_string($conn, $_POST['Summary']);
                                $revi = mysqli_real_escape_string($conn, $_POST['Review']);
                                $dateR = date('d/m/Y');
                              $insRive = mysqli_query($conn, "insert into tbl_review (`pid`, `ret`, `nick`, `sum`, `rev`, `date`) VALUES ('$pid', '$ret', '$Nick', '$Sum', '$revi', '$dateR' )"); 
                                if($insRive == true){
                                    echo '<div class="modal" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="https://www.freeiconspng.com/thumbs/success-icon/success-icon-10.png" style="width: 150px;margin-left: 41px;" ><br>
        <p style="font-size: 20px;
    color: #3BB54A;
    font-weight: bold;">Thank You! For Your Rating </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>';
                                }
                            }
                            ?>
                          <form action="" method="post">
                            
                            <h2>Rate this product<em>*</em></h2>
                            <div class="table-responsive reviews-table">
                              <div id="full-stars-example">
                                    <div class="rating-group">
                                        <input class="rating__input rating__input--none" name="rating[]" id="rating-none" value="0" type="radio">
                                        <label aria-label="No rating" class="rating__label" for="rating-none"><i class="rating__icon rating__icon--none fa fa-ban"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating[]" id="rating-1" value="1" type="radio">
                                        <label aria-label="2 stars" class="rating__label" for="rating-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating[]" id="rating-2" value="2" type="radio">
                                        <label aria-label="3 stars" class="rating__label" for="rating-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating[]" id="rating-3" value="3" type="radio" checked>
                                        <label aria-label="4 stars" class="rating__label" for="rating-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating[]" id="rating-4" value="4" type="radio">
                                        <label aria-label="5 stars" class="rating__label" for="rating-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rating[]" id="rating-5" value="5" type="radio">
                                    </div>

                                </div>
                            </div>
                            <div class="form-area">
                              <div class="form-element">
                                <label>Nickname <em>*</em></label>
                                <input required name="Nickname" type="text">
                              </div>
                              <div class="form-element">
                                <label>Summary of Your Review <em>*</em></label>
                                <input required name="Summary" type="text">
                              </div>
                              <div class="form-element">
                                <label>Review <em>*</em></label>
                                <textarea required name="Review"></textarea>
                              </div>
                              <div class="buttons-set">
                                <button class="button submit" title="Submit Review" type="submit" name="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;Review</span></button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Related Product Slider -->
  
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="related-product-area">
          <div class="page-header">
            <h2>Related Products</h2>
          </div>
          <div class="related-products-pro">
            <div class="slider-items-products">
              <div id="related-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 fadeInUp">
               <?php 
                      $relPrd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON' AND category = '$prd_cat'  ORDER BY `product`.`id` DESC LIMIT 16 ");
                  if(mysqli_num_rows($relPrd)>0){
                  while($allrow = mysqli_fetch_assoc($relPrd)){
                  
                ?>
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                       <?php 
                             if($allrow['Selling_Product'] != 'NO'){
                                echo '<div class="icon-sale-label sale-left">'.$allrow['Selling_Product'].'</div>';
                            }
                            if($allrow['Reted_Product'] != 'NO'){
                                 echo '<div class="icon-new-label sale-right">'.$allrow['Reted_Product'].'</div>';
                             }?>
                        <div class="pr-img-area"> <a title="Product title here" href="single_product.php?product_id=<?php echo $allrow['id']?>">
                          <figure> <img class="first-img" src="admin/images/product/fetcher-product/<?php echo $allrow['fetcher_img'];?>"> 
                          
                          <img class="hover-img" src="admin/images/product/product-img/<?php echo $allrow['prod1'];?>" alt="HTML template"></figure>
                          </a> </div>
                          
                           <div class="pr-info-area">
                          <div class="pr-button">
                           
                            <div class="mt-button quick-view"> <a href="quick_view_from_shop_page.php?product_id=<?php echo $allrow['id']?>"> <i class="fa fa-search"></i> </a> </div>
                          </div>
                        </div>
                      </div>
                    <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product title here" href="single_product.php?product_id=<?php echo $allrow['id']?>"><?php echo $allrow['name'];?></a> </div>
                          <div class="item-content">
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">৳ <?php echo $allrow['sPrice'];?></span> </span> </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><span> Add to Cart</span> </button>
                            
                            </div>   
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Related Product Slider End --> 
  
<?php include'inc/footer.php';?>