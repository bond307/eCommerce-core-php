<?php include 'lib/db.php';
include 'function.php';
//show product
if(isset($_GET['product_id'])){

    $allProd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON' AND id = '".$_GET['product_id']."'  ORDER BY `product`.`id` DESC LIMIT 16 ");
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
<!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>ShopMart premium HTML5 &amp; CSS3 template</title>
<meta name="description" content="best template, template free, responsive Template, fashion store, responsive Template, responsive html Template, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template">
<meta name="keywords" content="bootstrap, ecommerce, fashion, layout, responsive, responsive template, responsive template download, responsive Template, retail, shop, shopping, store, Premium website templates, web templates, Multi-Purpose Responsive HTML5 Template"/>

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
    $addCart = 'add-to-cart';
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
    
//show product from order table
$orderSQL = mysqli_query($conn, "SELECT * FROM tbl_order WHERE user_id = '$useri_id' ");
if(mysqli_num_rows($orderSQL)>0){
$showOrder = mysqli_fetch_assoc($orderSQL);
}
//show product details from order table
$prdDtlsSQL = mysqli_query($conn, "SELECT * FROM tbl_order_details WHERE user_id = '$useri_id' AND order_id = '".$showOrder['id']."' ");

    
//account info
$userInfoSQL =mysqli_fetch_assoc(mysqli_query($conn, "select * from tbl_user where id = '$useri_id'"));
  
  
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
          <div class="col-md-10 col-md-offset-1">
              
          <div class="my-account">
            <div class="page-title">
              <h2 class="">My Dashboard</h2>
             
            </div>
      
<h2 class=""><span style="color:green">WelCome</span> <span style="color:#E83F33"><?= $_SESSION['name'];?></span> </h2>
              <div class="sign-out"><a href="logout.php fa fa-sign-out sign-out">Logout</a></div>

<p>Click on the buttons inside the tabbed menu:</p>

<?php if(isset($succ))echo $succ;?>
<?php if(isset($error))echo $error;?>
<div class="accunt-op">
  <h3>Order List</h3>
  
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead style="background:#FE6907; color:#fff;">
            <tr>
                <th>#Invoic</th>
                <th>Order Date</th>
                <th>Address</th>
                <th>Payment Type</th>
                <th>Order Status</th>
                <th>Acction</th>
            </tr>
        </thead>
        <tbody>
                            <?php
                                    //show product from order table
$orderSQL = mysqli_query($conn, "SELECT * FROM tbl_order WHERE user_id = '".$_SESSION['id']."'");
        if(mysqli_num_rows($orderSQL)>0){
            while($orderinfo = mysqli_fetch_assoc($orderSQL)){
      ?>
      <tr>
          <td><?= $orderinfo['invoice']?></td>
          <td><?= $orderinfo['order_date']?></td>
          <td><?= $orderinfo['payment_type']?></td>
          <td> ৳ <?= $orderinfo['order_total_price']?></td>
          <td><a href="" class="badge badge-danger"><?= $orderinfo['order_status']?></a></td>
          <td>&nbsp;&nbsp; &nbsp;<a href="order-view.php?view_order=<?= $orderinfo['id']?>" class="fa fa-eye"></a> </td>
      </tr>
      <?php } }?>
                      
                                </tbody>
                            </table>

</div>
           
          
            
          </div>
          
     <!--  <div class="col-md-6">
               <div class="panel">
                   <div class="panel-head">
                       <strong>Account Info</strong>
                   </div>
                   <div class="panel-body">
                       <strong>Name: <?= $userInfoSQL['name']?></strong><br>
                       <strong>Email: <?= $userInfoSQL['email']?></strong>
                   </div>
               </div>
           </div>    
          </div>
      ----->
      
    </div>
  </div>
  

 <br><br><br> 
<?php include'inc/footer.php';?>