<?php 

include'lib/db.php';
$removeMSG = '';
    
//remove product form cart
if(isset($_GET['remove_cart'])){
    $RPID= $_GET['remove_cart'];
    $remove = mysqli_query($conn, "DELETE FROM tbl_cart WHERE pid = '$RPID'");
    if($remove == true){
        $removeMSG = '<div class="alert alert-success alert-dismissible show" role="alert">
      <strong>Success! </strong> product has been remove form your cart 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }else{
        echo 'something is worng';
    }
}//end


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
<?php include'inc/category.php';
//if session set or not
    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
    }
    

?>
  <!-- Breadcrumbs -->
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
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <?= $removeMSG;?>
      <div class="">
        <div class="">
        
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            <br>

            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                     
                      <th>Invoice</th>
                      <th>Product</th>
                      <th>Name</th>
                      <th>Product Price</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                      $total_price='';
                      $showCart = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE userID = '$user_id'");
                      if(mysqli_num_rows($showCart)>0){
                          while($showRows = mysqli_fetch_assoc($showCart)){
                      ?>
                    <tr>
                  
                    <td>#83747</td>
                     
                      <input type="hidden" class="pid" value="<?php echo $showRows['pid'];?>">
                     
                      <td class="cart_product">
                      <a><img src="admin/images/product/fetcher-product/<?php echo $showRows['img'];?>"></a>
                      </td>
                      
                      
                      <td class="cart_description">
                      <p class="product-name">
                      <a><?php echo $showRows['name'];?></a>
                      </p>
                       <?php 
                           
                        if($showRows['color'] != ''){
                        $get_color = explode(",",$showRows['color']);
                        foreach($get_color as $code){
                     ?>
                            <small>
                                <a>Color : <span class="cart-color" style="background: <?= $code?> ;color:#000; "></span></a>
                            </small>
                            
                            <?php } } ?>
                            
                         <?php if( $showRows['size'] != '' ){?>   
                        <small>
                        <a >Size : <span class=""><?= $showRows['size']?></span></a></small> 
                       <?php } ?>
                      
                       </td>
                       
                     <td class="price"><span>৳ <?php echo $showRows['price'];?></span></td>
                     
                      <input type="hidden" class="pprice" value="<?= $showRows['price']; ?>">
                      
                      
                      <td class="qty">
                      <input class="form-control input-sm itemQty" type="number" value="<?php echo $showRows['qyt']?>"
                             >
                      </td>
                      <td class="price"><span>৳ <?php echo $showRows['total'];?></span></td>
                      
                      <td class="action">
                          <a href="?remove_cart=<?php echo $showRows['pid'];?>"><i class="icon-close"></i>
                          </a>
                      </td>
                      
                    </tr>
                    <?php number_format($total_price += $showRows['total'])?>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="3" rowspan="2"></td>
                      
                    </tr>
                    <tr>
                      <td colspan="2"><strong>Total</strong></td>
                        <td colspan="2"><strong>৳ <?php if($total_price < 1){ echo '0'; }else{ echo $total_price;} ?></strong> </td>
                    </tr>
                    
                  </tfoot>
                 
                </table>
                 <?php }else{
                          echo '<div class="alert alert-danger alert-dismissible show" role="alert">
                          <strong>Sorry!</strong> You have not product on your cart page.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
                      } ?>
              </div>
         
              <div class="cart_navigation"> <a class="continue-btn" href="shop.php"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> 
              
              <a class="checkout-btn <?php if($total_price>1){ echo ''; }else{echo 'disabled';}?>"  href="checkout.php?user_id=<?= $_SESSION['id']?>"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
            
            </div>
          </div>
          
        </div>
      </div>
    </div>
    </div>
  </section>
    <!-- service section -->

<?php include'inc/footer.php';?>
<script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
        var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var price = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'update-cart.php',
        method: 'post',
        cache: false,
        data: {qty: qty, pid: pid, price: price,
        },
        success: function(response) {
          console.log(response);
        }
      });
    
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'add-to-cart.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
