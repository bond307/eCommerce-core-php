
<?php include 'inc/header.php';?>

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
  <!-- Breadcrumbs End --> 
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
      <img style="width: 150px; margin: 10px auto;margin-left: 200px;" src="images/sad.gif">
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
    
?>
  <!-- Slideshow  -->
  <div class="main-slider" id="home">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 banner-left hidden-xs"></div>
        <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12 jtv-slideshow">
          <div id="jtv-slideshow">
            <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
              <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                <ul>
                  <li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src='images/slider/slide-3.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="caption-inner">
                      <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='250'  data-y='110'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>Template for your business</div>
                      <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='200'  data-y='160'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap; color:#fff; text-shadow:none;'>Easy to modify</div>
                      <div class='tp-caption' data-x='310'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap; color:#f8f8f8;'>Perfect website solution for your</div>
                      <div class='tp-caption sfb  tp-resizeme ' data-x='370'  data-y='280'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='shop.php' class="buy-btn">Get Started</a> </div>
                    </div>
                  </li>
                  <li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src='images/slider/slide-1.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="caption-inner left">
                      <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='50'  data-y='110'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>Smooth, Rich & Loud Audio</div>
                      <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='50'  data-y='160'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>headphone</div>
                      <div class='tp-caption' data-x='72'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>World's Most advanced Wireless earbuds.</div>
                      <div class='tp-caption sfb  tp-resizeme ' data-x='72'  data-y='280'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='shop.php' class="buy-btn">EXPLORE NOW</a> </div>
                    </div>
                  </li>
                  <li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src='images/slider/slide-2.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="caption-inner left">
                      <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='350'  data-y='100'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>It’s Time To Look</div>
                      <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='350'  data-y='140'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The New</div>
                      <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='350'  data-y='185'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>Standard</div>
                      <div class='tp-caption' data-x='375'  data-y='245'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The New Standard. under favorable smartwatches</div>
                      <div class='tp-caption sfb  tp-resizeme ' data-x='375'  data-y='290'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='shop.php' class="buy-btn">Start Buying </a> </div>
                    </div>
                  </li>
                </ul>
                <div class="tp-bannertimer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- BANNER-AREA-START -->
  <section class="banner-area">
    <div class="container">
      <div class="row">
       <h1 class="cus-title">Our Populer Categorys </h1>
        <!-- Banner -->
        
        <?php
       $show = mysqli_query($conn, "SELECT * FROM category  ORDER BY `category`.`id` DESC");
       if(mysqli_num_rows($show)>0){
           while($Catrow = mysqli_fetch_assoc($show)){
          
    ?>
        <div class="home-category top-banner hidden-sm">
          <div class="jtv-banner3">
            <div class="jtv-banner3-inner"><a href="#"><img src="admin/CategoryImage/CategoryImg/<?php echo $Catrow['img'];?>" alt="HTML template"></a>
              <div class="hover_content">
                <div class="hover_data bottom">
                 
                  <div class="title"><?php echo $Catrow['category']?></div>
                  <p><a href="shop.php?cat_id<?php echo $Catrow['id'];?>" class="shop-now">Get it now!</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
   <?php } } ?>     
        
        
        
      </div>
    </div>
  </section>
  

  <div class="container">
    <div class="home-tab">
     <div id="msg"></div>
        <h1 class="cus-title">Our New Product's</h1>
       
      <div class="row">
           
                   <?php 
            $allProd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON'  ORDER BY `product`.`id` DESC LIMIT 16 ");
         if(mysqli_num_rows($allProd)>0){
             while($allrow = mysqli_fetch_assoc($allProd)){
        ?>        
        <div class="product mb-3">
        
        
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
                            
                            <div class="mt-button quick-view"> <a href="quick_view_from_home_page.php?product_id=<?php echo $allrow['id']?>"> <i class="fa fa-search"></i> </a> </div>
                          </div>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product title here" href="single_product.php?product_id=<?php echo $allrow['id']?>"><?php echo $allrow['name'];?></a> </div>
                          <div class="item-content">
                            <!----<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>--->
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">৳ <?php echo $allrow['sPrice'];?></span> </span> </div>
                            </div>
                           <form action="" method="post" class="form">
              <input type="hidden" class="pid" value="<?php echo $allrow['id']?>">
              <input type="hidden" class="pname" value="<?php echo $allrow['name']?>">
              <input type="hidden" class="pprice" value="<?php echo $allrow['sPrice']?>">
              <input type="hidden" class="pimg" value="<?php echo $allrow['fetcher_img']?>">
              <input type="hidden" class="ppinvoice" value="<?php echo $allrow['invoice']?>">
              <input type="hidden" class="user_id" value="<?php echo $useri_id;?>">
                                       
                                        <div class="pro-action">
                                            <button <?php echo $addCartReqst;?> type="button" class="add-to-cart <?= $addCart;?>" id="<?php echo $addCart;?>"><span> Add to Cart</span> </button>
                                        </div>
                                        </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
        </div>  
                 
            <?php } }?>      
             
                
              
              </div><br><br>
      <a href="shop.php" class="btn btn-danger col-md-4 col-md-offset-4">Load All</a>  
    </div>
     
  </div>

  <!----- ############################ News Latter #######################---->
  <?php 
    if(isset($_POST['news'])){
  $email = mysqli_real_escape_string($conn, $_POST['email'] );
$date = date('d/m/y - h:m:s');
  
        $sql = mysqli_query($conn, "INSERT INTO `tbl_news`(`email`, `date`) VALUES ('$email','$date')");
        
        if($sql == true){
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
    font-weight: bold;">Thank You! For Subscribe </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>';
            echo '<script>windo.location.reload=(index.php);</script>';
        }
    }
    
    ?>
  <div class="footer-newsletter">
    <div class="container">
      <div class="row"> 
        <!-- Newsletter -->
        <div class="col-md-6 col-sm-6">
          <form id="newsletter-validate-detail" method="post" action="">
            <h3>Join Our Newsletter</h3>
            <div class="title-divider"><span></span></div>
            <p class="sub-title text-center">Get 25% off</p>
            <div class="newsletter-inner">
              <input type="email" class="newsletter-email" name='email' placeholder='Enter Your Email'/>
              <button class="button subscribe" type="submit" title="Subscribe" name="news">Subscribe</button>
              
            </div>
          </form>
        </div>
        <!-- Customers Box -->
        <div class="col-sm-6 col-xs-12 testimonials">
          <div class="page-header">
            <h2>What Our Customers Say</h2>
          </div>
          <div class="slider-items-products">
            <div id="testimonials-slider" class="product-flexslider hidden-buttons home-testimonials">
              <div class="slider-items slider-width-col4 ">
                <div class="holder">
                  <blockquote>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad 
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip volutpat.
                    Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel.</blockquote>
                  <div class="thumb"> <img src="images/testimonials-img3.jpg" alt="testimonials img"> </div>
                  <div class="holder-info"> <strong class="name">John Doe</strong> <strong class="designation">CEO, Company</strong></div>
                </div>
                <div class="holder">
                  <blockquote>Lorem ipsum dolor sit ame consetur adipisicing elit. Voluptate, consetur adipisicing elit.Lorem ipsum dolor sit ame consetur adipisicing elit.Lorem ipsum dolor sit ame consetur adipisicing elit. Voluptate, consetur adipisicing elit.</blockquote>
                  <div class="thumb"> <img src="images/testimonials-img1.jpg" alt="testimonials img"> </div>
                  <div class="holder-info"> <strong class="name">Vince Roy</strong> <strong class="designation">CEO, Newspaper</strong> </div>
                </div>
                <div class="holder">
                  <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim. Donec sit amet eros. Cras feugiat luctus nulla vitae posuere. Suspendisse potenti. </blockquote>
                  <div class="thumb"> <img src="images/testimonials-img2.jpg" alt="testimonials img"> </div>
                  <div class="holder-info"><strong class="name">John Doe</strong> <strong class="designation">CEO, ABC Softwear</strong></div>
                </div>
                <div class="holder">
                  <blockquote>Aliquam erat volutpat. Sed do eiusmod tempor incididunt Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget. Donec sit amet eros. Nulla non ornare nisi, sed condimentum lorem. Morbi sed vehicula magna.</blockquote>
                  <div class="thumb"> <img src="images/testimonials-img4.jpg" alt="testimonials img"> </div>
                  <div class="holder-info"> <strong class="name">Vince Roy</strong> <strong class="designation">CEO, XYZ Softwear</strong></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php include'inc/footer.php';?>