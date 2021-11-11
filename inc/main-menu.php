<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<?php 

error_reporting(0);
    
require('lib/db.php');

//if session set or not
    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
    }else{
        $disable = 'disabled';
    }
?>

     
     
      <div class="header-inner">
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-xs-12 jtv-logo-block">
              <!-- Header Logo -->
              <div class="logo"><a title="e-commerce" href="index.php"><img alt="ShopMart" title="ShopMart" src="images/logo.png"></a> </div>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-6 jtv-top-search"> 
              
              <!-- Search -->
              
              <div class="top-search">
                <div id="search">
                
                    <div class="input-group">
                      <select class="cate-dropdown hidden-xs hidden-sm" name="category_id">
                        <option class="selected disabled">All Categories</option>
                         <?php
                  $cat = mysqli_query($conn, "SELECT * FROM category");
                  if(mysqli_num_rows($cat) > 0){
                      while($catRow = mysqli_fetch_assoc($cat)){
                          
                          
             ?>
                        <option><a href="shop.php?cat_id<?= $catRow['id']?>"><?php echo $catRow['category'];?></a></option>
                          <?php 
                    $sub_cat = mysqli_query($conn, "SELECT * FROM sub_category WHERE category_id = '".$catRow['id']."'");
                          if(mysqli_num_rows($sub_cat) > 0){
                      
                   while($sub_catRow = mysqli_fetch_assoc($sub_cat)){
                ?>
                        <option>&nbsp;&nbsp;&nbsp;<a href="shop.php?cat_id<?= $sub_catRow['id']?>"><?php echo $sub_catRow['sub_category'];?> </a></option>
                        <?php } } ?>
                        
                    <?php } } ?>
                      
                      </select>
                    <form action="">
                      <input type="text" class="form-control" placeholder="Enter your search..." name="search" id="search_text">
                      <button id="search" class="btn-search" type="button"><i class="fa fa-search"></i></button>
                    </form>

                    </div>
                    <ul class="list-group" id="result">
                      
                  
                    </ul>
                  
                </div>
              </div>
              
              <!-- End Search --> 
              
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 top-cart">
             
              <div class="link-wishlist"> 
              <?php 
                if(isset($_SESSION['user_login']) && $_SESSION['user_login']=='yes') { ?><a href="account.php"> <i class="icon-user icons"></i><span> My Account</span></a>
                <?php }else{ ?> 
                  <i class="icon-user icons"></i><span> <a href="login.php">Login</a></span><?php } ?></div>
              <!-- top cart -->
              <div class="top-cart-contain">
                <div class="mini-cart">
                  <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="#">
                    <div class="cart-icon"><i class="icon-basket-loaded icons"></i><span class="cart-total"></span></div>
                    <div class="shoppingcart-inner hidden-xs"><span class="cart-title">My Cart</span> </div>
                    </a></div>
                  <div>
                    <div class="top-cart-content">
                      <div class="block-subtitle hidden">Recently added items</div>
                      <ul id="cart-sidebar" class="mini-products-list">
                       
                        <?php 
                          if(isset($_SESSION['id'])){
                         
                      $total_price='';
                      $showCart = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE userID = '$user_id'");
                      if(mysqli_num_rows($showCart)>0){
                          while($showRows = mysqli_fetch_assoc($showCart)){
                      ?>
                       
                        <li class="item odd"> <a href="cart.php" class="product-image"><img src="admin/images/product/fetcher-product/<?php echo $showRows['img'];?>" width="65"></a>
                          <div class="product-details">
                         
                            <p class="product-name">
                            <a href="shopping_cart.html"><?php echo $showRows['name'];?></a> 
                            </p>
                            <strong><?php echo $showRows['qyt']?></strong> x <span class="price">৳ <?= $showRows['price']; ?></span> </div>
                        </li>
                     <?php number_format($total_price += $showRows['total'])?>
                        <?php } }else{ ?>
                        <div class="alert alert-danger">No Product In Cart</div>
                        <?php } }else{?>
                        <div class="alert alert-danger"><a href="login.php">Login First</a></div>
                        <?php }?>
                      </ul>
                      <div class="top-subtotal">Subtotal: <span class="price"><?php echo '৳'. $total_price;?></span></div>
                      <div class="actions">
                        <button <?= $disable?> class="btn-checkout" type="button" onClick="location.href='checkout.php'"><i class="fa fa-check"></i><span>Checkout</span></button>
                        <button <?= $disable?> class="view-cart" type="button" onClick="location.href='cart.php'"><i class="fa fa-shopping-cart"></i><span>View Cart</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"get_search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>