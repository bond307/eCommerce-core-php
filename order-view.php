<?php 

include'lib/db.php';
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
    //if session set or not
    if(isset($_GET['view_order'])){
        echo $order_id = $_GET['view_order'];
    }
    
//product info form cart page
$total_price='';
$tbl_order = mysqli_query($conn, "SELECT * FROM tbl_order WHERE user_id = '$user_id' AND id = '$order_id'");
    if(mysqli_num_rows($tbl_order)>0){
        $order = mysqli_fetch_assoc($tbl_order);
        $order_id = $order['id'];
        $payType = $order['payment_type'];
        $orderInvoic = $order['invoice'];
        $OrderTotalPrice = $order['order_total_price'];
        $shipAd = $order['ship'];
}
    
    // show shipping details
    
    $tbl_ship = mysqli_query($conn, "SELECT * FROM tbl_ship_another WHERE user_id = '$user_id' AND order_id = '$order_id'");
    
// show product fom product tbl
$tbl_order = mysqli_query($conn, "SELECT * FROM tbl_order_details WHERE user_id = '$user_id' AND order_id = '$order_id'");


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
    <div class="main container"><br><br>
    <div id="print">
    <div class="col-md-10 col-md-offset-1 order-success">
        <div class="col-md-6 col-md-offset-3">
            <img src="images/logo.png" alt=""><br>
        </div>
        <div class="col-md-8 col-md-offset-2 shrt-des">
            <div class="row">
                <div class="col-md-4">
                    <p>Order Id</p>
                    <h5>#<?= $orderInvoic;?></h5>
                </div>
                <div class="col-md-4">
                    <p>Total Amount</p>
                    <h5 class="alt">৳ <?= $OrderTotalPrice?></h5>
                </div>
                <div class="col-md-4">
                    <p>Payment Type</p>
                    <h5><?= $payType;?></h5>
                </div>
            </div>
        </div>
    </div>
    
    <!---- order info ----->
    <div class="col-md-10 col-md-offset-1">
        
            <div class="order-info">
                <h4>ORDER DETAILS</h4>
                <table class="table table-border">
                   <thead>
                        <tr>
                        <th>IMAGES</th>
                        <th>PRODUCT</th>
                        <th>QUANTITY</th>
                        <th>PRICE</th>
                        <th>TOTAL</th>
                    </tr>
                   </thead>
                   <?php 
              if(mysqli_num_rows($tbl_order)){
                  while($Order_Product = mysqli_fetch_assoc($tbl_order)){ 
                    ?>
                    <tr>
                       <td><img style="height:100px;" src="admin/images/product/fetcher-product/<?= $Order_Product['product_img']?>" alt=""></td>
                        <td>
                        <h5><?= $Order_Product['product_name']?></h5>
                          <?php 
                         if($Order_Product['product_size'] != '' && $Order_Product['product_color'] != '' ){  ?>
                            <small><a>Color : <span class="cart-color" style="background: <?= $Order_Product['product_color']?>;"></span></a></small>
                        <small><a >Size : <span class=""><?= $Order_Product['product_size']?></span></a></small> 
                       <?php } ?>  
                        </td>
                        <td><?= $Order_Product['product_qty']?></td>
                        <td class="">৳ <?= $Order_Product['product_price']?></td>
                        <td class="alt"> ৳ <?= $prdPrice =$Order_Product['product_qty']*$Order_Product['product_price']?></td>
                    </tr>
                    
                  <?php  $intotal += $prdPrice; } }?>  
                    
                    <tr>
                        <td colspan="3"></td>
                        <td class="">Sub Total</td>
                        <td class="alt">৳ <?= $intotal;?></td>
                    </tr>
                     
                    <tr>
                        <td class="">Shipping </td>
                        <td colspan="3"></td>
                        <?php if($shipAd == 'In Dhaka' ){ ?>
                        <td class="alt">৳ 60 <span style="color:#000">ঢাকার ভিতরে</span></td>
                        <?php }else{ ?>
                        <td class="alt">৳ 100 <span style="color:#000">ঢাকার বাহিরে </span></td>
                        <?php }?>
                    </tr>
                    
                     <tr>
                        <td colspan="3"></td>
                        <td class=""> Total</td>
                        <td class="alt"><?= $OrderTotalPrice;?></td>
                    </tr>
                </table>
                
            </div><br>
            
            <div class="order-info">
            <div class="row">
               <h4>ORDER DETAILS</h4>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-head">
                            <strong>BILLING DETAILS</strong>
                        </div>
                        <div class="panel-body">
                            <strong><?= $order['user_address']?>-<?= $order['zip']?></strong><br>
                            <strong><?= $order['user_city']?></strong><br>
                            <strong><?= $order['user_state']?></strong><br>
                            <strong><?= $order['user_cutry']?></strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="panel">
                        <div class="panel-head">
                            <strong>SHIPPING DETAILS</strong>
                        </div>
                        <?php 
                    if(mysqli_num_rows($tbl_ship)>0){
                        $Shiporder = mysqli_fetch_assoc($tbl_ship);
                   ?>
                        <div class="panel-body">
                            <strong><?= $Shiporder['user_address']?>-<?= $Shiporder['zip']?></strong><br>
                            <strong><?= $Shiporder['user_city']?></strong><br>
                            <strong><?= $Shiporder['user_state']?></strong><br>
                            <strong><?= $Shiporder['user_cutry']?></strong>
                        </div>
                        <?php }else{ ?>
                        <div class="panel-body">
                            <strong><?= $order['user_address']?>-<?= $order['zip']?></strong><br>
                            <strong><?= $order['user_city']?></strong><br>
                            <strong><?= $order['user_state']?></strong><br>
                            <strong><?= $order['user_cutry']?></strong>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div><br><br>
       
       
        
    </div>
     </div>
  <div class="col-md-8 col-md-offset-2">
         <a href="account.php" class="pull-left btn btn-secoundery"><i class="fa fa-arrow-left"></i> Back Dashboard</a>
        <a href="invoice.php?order_id=<?= $order_id?>" class="pull-right btn btn-danger"><i class="fa fa-print"> </i>print</a>
        
  </div>
    </div>
  </section>
    <!-- service section -->
<br><br><br><br>
<?php include'inc/footer.php';?>
<script>
    
function printDiv(print) {
     var printContents = document.getElementById('print').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}    
</script>
