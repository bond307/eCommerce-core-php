<?php 
include'lib/db.php';
$outDhaka = '';
$indhaka = '';
$Indhakachecked = '';
$Outdhakachecked = '';
if(isset($_GET['outDhaka'])){
    $outDhaka = '100';
    $Outdhakachecked = 'checked';
    echo '<script>window.scrollTo(1000, 1500);</script>';
}

if(isset($_GET['indhaka'])){
    $indhaka = '60';
    $Indhakachecked = 'checked';
    echo '<script>window.scrollTo(1000, 1500);</script>';
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
    
//product info form cart page
$total_price='';
$showCart = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE userID = '$user_id'");   
$num = mysqli_num_rows($showCart);
    
?>


<div class="breadcrumbs">
<div class="container">
<div class="row">
<div class="col-xs-12">
    <ul>
        <li class="home"> <a title="Go to Home Page" href="shop.php">Shope</a><span>&raquo;</span></li>
        <li class="home"> <a title="Go to Home Page" href="cart.php">Cart</a><span>&raquo;</span></li>
        <li><strong>Checkout</strong></li>
    </ul>
</div>
</div>
</div>
</div>
<!-- Breadcrumbs End -->
<!-- Main Container -->
<div class="main-container col2-left-layout">
<div class="container">
<form action="create-order.php" method="post">
<?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ ?>
<div class="row">
<div class="col-main col-sm-7 col-xs-12">
    <div class="page-title">
        <h2>Checkout</h2>
    </div>
    <div class="page-content checkout-page">
        <h4 class="checkout-sep">BILLING DETAILS</h4>
        <div class="box-border">
            <ul>
                <li class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                            <label for="first_name" class="required">Full Name *</label>
                        <input type="text" class="input form-control" name="oname" id="first_name"  value="<?= $_SESSION['name']?>">
                       </div>
                    </div>
                   >
                </li>
                <!--/ .row -->
                <li class="row">
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="ocname" class="input form-control" id="company_name" value="N/A">
                        </div>
                    </div>
                    <!--/ [col] -->
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label for="email_address" class="required">Email Address *</label>
                        <input type="text" class="input form-control" name="oemail" id="email_address" value="<?= $_SESSION['email']?>" required>
                        </div>
                    </div>
                    <!--/ [col] -->
                </li>


                <li class="row">

                    <div class="col-sm-6">
                       <div class="form-group">
                        <label class="required">Country *</label>
                        <input class="input form-control" type="text" name="ocuntry" value="Bangladesh" readonly required>
                        </div>
                    </div>
                    <!--/ [col] -->
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label class="required">State *</label>
                        <select class="input form-control" name="ostate" required>
                            <option value="Barisal">Barisal</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                        </div>
                    </div>
                    <!--/ [col] -->

                </li>



                <li class="row">
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label for="city" class="required">City *</label>
                        <input class="input form-control" type="text" name="ocity" id="city" required>
                        </div>
                    </div>
                    <!--/ [col] -->

                    <div class="col-sm-6">
                       <div class="form-group">
                        <label for="city" class="required">Phone Number *</label>
                        <input class="input form-control" type="text" name="onumber" id="city" required>
                        </div>
                    </div>
                    <!--/ [col] -->
                </li>
                <!--/ .row -->

                <!--/ .row -->
                <li class="row">
                    <div class="col-xs-12">
                       <div class="form-group">
                        <label for="address" class="required">Address *</label>
                        <input type="text" class="input form-control" name="oaddress" id="address" required>
                        </div>
                    </div>
                    <!--/ [col] -->

                </li>
                 <li class="row">
                    <div class="col-xs-12">
                       <div class="form-group">
                        <label for="address" class="required">ZIP Code *</label>
                        <input type="text" class="input form-control" name="zip" id="address" required>
                        </div>
                    </div>
                    <!--/ [col] -->

                </li>
                <hr>
                <li class="row">
                   
                </li>
                <br>


            </ul>

            <!--/ [col] -->
            
            <!------###############################################----->
            <!------################## Ship to another ##################----->
            <!------#####################################----->
                               
<p>
    <label type="button" style="font-size:20px;">
        <input  data-toggle="collapse" data-target="#ship" aria-expanded="false" aria-controls="collapseExample" for="radio_button_6" type="checkbox" name="shipto_others" value="Yes" id="radio_button_6"/>
        SHIP TO A DIFFERENT ADDRESS?
    </label>

</p>
    <div class="collapse payment" id="ship">
                    <div class="row">
                        <div class="col-sm-12">
                       <div class="form-group">
                            <label for="first_name" class="required">Full Name *</label>
                        <input type="text" class="input form-control" name="ONoname" id="first_name">
                       </div>
                    </div>
                    </div>
                  
                
                <!--/ .row -->
                <li class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="ONocname" class="input form-control" id="company_name" value="N/A">
                        </div>
                    </div>
                 
                



                    <div class="col-sm-6">
                       <div class="form-group">
                        <label class="required">Country *</label>
                        <input class="input form-control" type="text" name="ONocuntry" value="Bangladesh" readonly >
                        </div>
                    </div>
                    <!--/ [col] -->
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label class="">State *</label>
                        <select class="input form-control" name="ONostate" >
                            <option value="Barisal">Barisal</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                        </div>
                    </div>
                    <!--/ [col] -->

                



             
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label for="city" class="">City *</label>
                        <input class="input form-control" type="text" name="ONocity" id="city" >
                        </div>
                    </div>
                    <!--/ [col] -->

                    <div class="col-sm-6">
                       <div class="form-group">
                        <label for="city" class="">Phone Number *</label>
                        <input class="input form-control" type="text" name="ONonumber" id="city" >
                        </div>
                    </div>
                    <!--/ [col] -->
                
                <!--/ .row -->

                <!--/ .row -->
             
                    <div class="col-xs-12">
                       <div class="form-group">
                        <label for="address" class="">Address *</label>
                        <input type="text" class="input form-control" name="ONoaddress" id="address" >
                        </div>
                    </div>
                    <!--/ [col] -->

                
              
                    <div class="col-xs-12">
                       <div class="form-group">
                        <label for="address" class="">ZIP Code *</label>
                        <input type="text" class="input form-control" name="ONzip" id="address" >
                        </div>
                    </div>
                    <!--/ [col] -->

                
                <hr>
              
                <br>

    </div>
            
          <div class="col-sm-6">
                       <div class="form-group">
                        <label for="city" class="">Shopping Note's</label>
                        <textarea class="form-control" name="onote"> Type You Note's....</textarea>
                        </div>
                    </div>   
            
        </div>


    </div>
</div>


<aside class="right sidebar col-sm-5 bg-dark col-xs-12">
    <div class="sidebar-checkout block">
       <?php if($num > 0){ ?>
                <div class="chk-card">
                <h4 class="checkout-sep"> Product Info</h4>
                <table class="table">
                   
                    <tr>
                        <th class="cus-tbl">Image</th>
                        <th class="cus-tbl">Product</th>
                        <th class="cus-tbl">Sub Total</th>
                    </tr>
                    <?php 
                   
                      if(mysqli_num_rows($showCart)>0){
                          while($showRows = mysqli_fetch_assoc($showCart)){
                       $intoalPrice = $total_price += $showRows['total'];
                              
                    ?>
                    <tr>
                       <input type="hidden" name="product_img" value="<?= $showRows['img']?>">
                       <td style="width:20%"><img style="height:50px;" src="admin/images/product/fetcher-product/<?= $showRows['img']?>" alt=""></td>
                        <td><?= $showRows['name']; ?> <span style="color: #000;font-size: 15px; margin-left: 20px;">X <?= $showRows['qyt']?></span>
                         <?php 
                              //if isset colot or size
                        if($showRows['size'] != ''){  ?>
                        <small><a >Size : <span class=""> <?= $showRows['size']?></span></a></small> 
                       <?php }if($showRows['color'] != '' ){
                             $get_color = explode(",",$showRows['color']);
                            foreach($get_color as $code){
                            ?>
                         <small><a>Color : <span class="cart-color" style="background: <?= $code?>;color:#000; font-size:12px;"></span></a></small>
                         <?php } }?>
                          
                        </td>

                        <td>৳ <?php echo $TotalProductPrice = $showRows['price']*$showRows['qyt'];?></td>
                    </tr>
                    
                    <!------ hiden input firnd ------>
                    
                   <?php } }?>

                    <tr>
                        <th colspan="2" class="cus-tbl">Total Product Price</th>
                        <th class="cus-tbl">৳ <?= $intoalPrice;?></th>
                        <input type="hidden" name="total_price" value="<?= $intoalPrice;?>">
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="2">
                            <p class="subcaption bold">Shipping</p>
                        </td>

                        <td>
                           
                              
                               <label for="radio_button_3">
                                <input onclick="window.location='checkout.php?indhaka';" <?= $Indhakachecked;?> type="radio" class="shop" value="In Dhaka" name="ship" id="radio_button_3" required>
                                ঢাকার ভিতরে</label> 
                                <label for="radio_button_3">
                                <input onclick="window.location='checkout.php?outDhaka';" <?= $Outdhakachecked;?> type="radio" class="shop" value="Out Dhaka" name="ship" id="radio_button_3" required>
                                 ঢাকার বাহিরে </label>
                              
                               
                        </td>
                        
                    </tr>
                     
                   <tr>
                       <td></td>
                   </tr>
                   
                    <tr>
                        <th colspan="2" class="font-20">Intotal</th>

                        <?php if($indhaka == true){ $phid = 'display: none;';?>
                        <th class="font-20">৳ <?= $intoalPrice+$indhaka;?></th>
                        <input type="hidden" name="intoal">
                        <?php } if($outDhaka == true){ $phid = 'display: none;';?>
                        <input type="hidden" name="intoal">
                        <th class="font-20">৳ <?= $intoalPrice+$outDhaka;?></th>
                        <?php }  ?>
                        <th class="font-20" style="<?= $phid;?>">৳ <?= $intoalPrice;?></th>
                    </tr>
                </table>
                <h4 class="chackout-pay"> - Payment Information</h4>
                <div class="box-border">
                    <ul>
                                       
        <!---- show bkash form database ------>
        <?php 
        $cash_on = mysqli_query($conn, "SELECT * FROM cash_on WHERE status = 'ON' ");       if(mysqli_num_rows($cash_on)>0){
         $cash_on = mysqli_fetch_assoc($cash_on); 
        ?>   
                        <li>
                            <p>
                                <label type="button">
                                   
                                    <input  data-toggle="collapse" data-target="#payment" aria-expanded="false" aria-controls="collapseExample" for="radio_button_6" type="radio" name="payment_option" value="ক্যাশ অন ডেলিভারি" id="radio_button_6" required/>
                                    Cash On Delivery</label>
 
                            </p>
                            <div class="collapse payment" id="payment">
                                <div class="card card-body">
                                    <?= nl2br($cash_on['details']);?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
        <!---- show cash_on form database ------>
        <?php 
        $bkash = mysqli_query($conn, "SELECT * FROM bkash WHERE status = 'ON' ");       if(mysqli_num_rows($bkash)>0){
         $bkash = mysqli_fetch_assoc($bkash); 
        ?>                
                              
                        <li>
                            <p>
                                <label type="button" class="pay-method">
                                    <input required data-toggle="collapse" data-target="#payment2" aria-expanded="false" aria-controls="collapseExample" for="radio_button_6" type="radio" name="payment_option" value="বিকাশ" id="radio_button_6">
                                    <?= $bkash['bkash']?> &nbsp;<img src="https://www.logo.wine/a/logo/BKash/BKash-Icon-Logo.wine.svg" alt=""></label>
 
                            </p>
                            <div class="collapse payment" id="payment2">
                                <div class="card card-body">
                                   
                                    <p class="pay-info"><?= nl2br($bkash['bkash_details']);?></p>
                                    <h4>- Number: <?= $bkash['number'];?> </h4><br>
                                    
                                    <div class="bks-info">
                                        <div class="form-group row">
                                            <span class="col-sm-5 col-form-label">bKash Number: </span>
                                            <div class="col-sm-7">
                                              <input type="text" class="form-control"  placeholder="01*********" name="bkash">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <span class="col-sm-5 col-form-label">bKash Transaction ID:</span>
                                            <div class="col-sm-7">
                                              <input type="text" class="form-control" placeholder="X%68Hsze" name="bkashID">
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <!------ end bkash ---->
                     <?php 
        $nogod = mysqli_query($conn, "SELECT * FROM nogod WHERE status = 'ON' ");       if(mysqli_num_rows($nogod)>0){
         $nogod = mysqli_fetch_assoc($nogod); 
        ?>     
                        <li>
                            <p>
                                <label type="button" class="pay-method">
                                    <input required data-toggle="collapse" data-target="#nogod" aria-expanded="false" aria-controls="collapseExample" for="radio_button_6" type="radio" name="payment_option" id="radio_button_6" value="নগদ">
                                    <?= $nogod['nogod']?> <img src="https://download.logo.wine/logo/Nagad/Nagad-Logo.wine.png" alt=""></label>

                            </p>
                            <div class="collapse payment" id="nogod">
                                <div class="card card-body">
                                    <p><?= $nogod['nogod_details']?></p>
                                    <h4>- Number: <?= $nogod['number']?></h4><br>
                                    <div class="bks-info">
                                        <div class="form-group row">
                                            <span class="col-sm-5 col-form-label">Nogod Number: </span>
                                            <div class="col-sm-7">
                                              <input type="text" class="form-control"  placeholder="01*********" name="nogod">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <span class="col-sm-5 col-form-label">Nogod Transaction ID:</span>
                                            <div class="col-sm-7">
                                              <input type="text" class="form-control" placeholder="X%68Hsze" name="nogodID">
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </li>  
                <?php }?>            <!------- end nogod ----->
                    
        <?php 
        $roket = mysqli_query($conn, "SELECT * FROM roket WHERE status = 'ON' ");       if(mysqli_num_rows($roket)>0){
         $roket = mysqli_fetch_assoc($roket); 
        ?>     
                        <li>
                            <p>
                                <label type="button" class="pay-method">
                                    <input required data-toggle="collapse" data-target="#roket" aria-expanded="false" aria-controls="collapseExample" for="radio_button_6" type="radio" name="payment_option" id="radio_button_6" value="রকেট">
                                    <?= $roket['roket']?> <img src="https://www.metlife.com.bd/content/dam/metlifecom/bd/mobile-banking/rocket.png" alt=""></label>

                            </p>
                            <div class="collapse payment" id="roket">
                                <div class="card card-body">
                                    <div class="card card-body">
                                    <p><?php echo nl2br($roket['roket_details'])?></p>
                                    <h4>- Number: <?= $roket['number']?></h4><br>
                                    <div class="bks-info">
                                        <div class="form-group row">
                                            <span class="col-sm-5 col-form-label">Roket Number: </span>
                                            <div class="col-sm-7">
                                              <input type="text" class="form-control"  placeholder="01*********" name="roket">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <span class="col-sm-5 col-form-label">Roket Transaction ID:</span>
                                            <div class="col-sm-7">
                                              <input type="text" class="form-control" placeholder="X%68Hsze" name="roketID">
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </li><!-- end roket= ---->
                        <?php } ?>
                    </ul>

               
                    <button class="placeBTN" type="submit" name="order"><i class="fa fa-check"></i> Place Order</button> 
                </div>

            </div>
<?php }else{
    echo '<p>Your cart is empty...</p>';
}?>

        </div>
</aside>
</div>
<?php }else{ ?>


          <div class="col-md-6 col-sm-8 mt-5 mb-5 col-md-offset-3">
           <div class="alert alert-danger">
               <strong>Please log in frist!</strong> then you can 
           </div>
           
           <a href="login.php" class="btn btn-danger">Logi in Now</a>
          </div>

<?php }?>
</form>
</div>
</div>
<br><br>
<?php include'inc/footer.php';?>