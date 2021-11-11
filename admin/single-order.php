<?php include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
  
?>
<?php include 'lib/db.php';

if(isset($_GET['view_order'])){
    $order_id = $_GET['view_order'];
}

//################################order details######################################//
$pay_details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_pay_info` WHERE order_id = '$order_id' "));
    
//################################order details######################################//
 $odrSQL = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_order WHERE id = '$order_id'"));
    if($odrSQL['order_status'] == 'Pending'){
        $badg = 'badge-danger';
    }elseif($odrSQL['order_status'] == 'Complete'){
        $badg = 'badge-success';
    }else{
        $badg = 'badge-primary';
    }
    
    //############################### Payment ################################//
    if($odrSQL['paymet_status'] == 'Pending'){
        $badgPay = 'badge-danger';
    }elseif($odrSQL['paymet_status'] == 'Complete'){
        $badgPay = 'badge-success';
    }else{
        $badgPay = 'badge-primary';
    }
?>
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';?>       
       
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg'];?>
<!-- ============================================================== -->
<!-- Main body contand  -->
<!-- ============================================================== -->
       <div class="row">
           <div class="col-md-8">
              
               <div class="card">
                   <div class="card-header bg-light">
                       <h4>Order #434 - Details</h4>
                   </div>
                   <div class="card-body">
                       <table class="table">
                           <thead>
                               <th>Items</th>
                               <th>Qty</th>
                               <th>Price</th>
                           </thead>
                           <tbody>
                              <?php 
                               
                               $sub_total= '';
                               $Price_total= '';
                               // show product fom product tbl
                $tbl_order = mysqli_query($conn, "SELECT * FROM tbl_order_details WHERE order_id = '$order_id'");
              if(mysqli_num_rows($tbl_order)){
                  while($Order_Product = mysqli_fetch_assoc($tbl_order)){ 
                      $Price_total = $Order_Product['product_qty']*$Order_Product['product_price'];
                      $sub_total += $Price_total; 
                    ?>
                
                        <tr>
                           <td>
                              <img src="images/product/fetcher-product/<?= $Order_Product['product_img']?>" width="80" alt="" class="float-left">
                              <a href="" class="ml-5">
                              <h4><?= $Order_Product['product_name']?></h4>
                            <?php 
                         if($Order_Product['product_color'] != ''){  ?>
                           
                            <small><a>Color : <span class="cart-color" style="background: <?= $Order_Product['product_color']?>;"></span><?= $Order_Product['product_color']?></a></small>
                            
                            <?php  } ?>
                            
                       <?php  if($Order_Product['product_size'] != ''){  ?>    
                        <small><a >Size : <span class=""><?= $Order_Product['product_size']?></span></a></small> 
                       <?php } ?>  
                              </a>
                           </td>
                           <td><?= $Order_Product['product_qty']?></td>
                           <td>৳ <?= $Price_total;?></td>
                       </tr>
                      
                        <?php } }?>

                       <tr>
                           <td style="font-size:20px;" colspan="2"><h5>Sub Total</h5></td>
                           <td style="font-size:20px;">৳ <?= $sub_total?></td>
                       </tr>
                       <tr>
                          <td colspan="2">Shipping</td>
                          <?php if($odrSQL['ship'] == 'Out Dhaka'){ ?>
                           <td>৳ 100 <span> ঢাকার বাহিরে </span></td>
                           <?php }else{ ?>
                           <td>৳ 60 <span> ঢাকার ভিতরে  </span></td>
                           <?php } ?>
                       </tr>
                       <tr>
                           <td style="font-size:24px;" colspan="2"><h4>Total</h4></td>
                           <td style="font-size:24px;">৳ <?= $odrSQL['order_total_price'];?> </td>
                       </tr>
                         
                           </tbody>
                       </table>
                   </div>
               </div><!----- end ---->
               <div class="card">
                   <div class="card-header bg-light">
                       <h4>Order Note From Customer</h4>
                   </div>
                   <div class="card-body">
                       <p><?php echo nl2br($odrSQL['user_shoping_note'])?></p>
                   </div>
               </div><!----e nd ---->
               
              <div class="row">
                  <div class="col-md-6">
                   <div class="card">
                   <div class="card-header bg-light">
                       <h4>Billing Address</h4>
                   </div>
                   <div class="card-body" style="font-size: 17px;font-weight: 500;">
                        <strong><?= $odrSQL['user_address']?>-<?= $odrSQL['zip']?>,</strong><br>
                        <strong><?= $odrSQL['user_city']?>,</strong><br>
                        <strong><?= $odrSQL['user_state']?>,</strong><br>
                        <strong><?= $odrSQL['user_cutry']?></strong>
                    </div>
               </div><!----e nd ---->
              </div>
              <div class="col-md-6">
                   <div class="card">
                   <div class="card-header bg-light">
                       <h4>Shiping Address</h4>
                   </div>
                 <?php 
        $tbl_ship = mysqli_query($conn, "SELECT * FROM tbl_ship_another WHERE  order_id = '$order_id'");
                    if(mysqli_num_rows($tbl_ship)>0){
                        $Shiporder = mysqli_fetch_assoc($tbl_ship);
                   ?>
                        <div class="card-body" style="font-size: 17px;font-weight: 500;">
                            <strong><?= $Shiporder['user_address']?>-<?= $Shiporder['zip']?>,</strong><br>
                            <strong><?= $Shiporder['user_city']?>,</strong><br>
                            <strong><?= $Shiporder['user_state']?>,</strong><br>
                            <strong><?= $Shiporder['user_cutry']?></strong>
                        </div>
                        <?php }else{ ?>
                        <div class="card-body" style="font-size: 17px;font-weight: 500;">
                        <strong><?= $odrSQL['user_address']?>-<?= $odrSQL['zip']?>,</strong><br>
                        <strong><?= $odrSQL['user_city']?>,</strong><br>
                        <strong><?= $odrSQL['user_state']?>,</strong><br>
                        <strong><?= $odrSQL['user_cutry']?></strong>
                    </div>
                        <?php }?>
               </div><!----e nd ---->
              </div>
               
              </div>
               
               
           </div>
           
           <div class="col-md-4">
               <!---- payment details- ---->
               <div class="card">
                   <div class="card-header bg-light">
                       <h4>Paymet Histry</h4>
                   </div>
                   <div class="card-body">
                         <h4>Payment Status: <span class="badge <?= $badgPay;?>"> <?= $odrSQL['paymet_status']?></span> <span class="float-right"><a data-toggle="collapse" href="#payment">Edit</a></span></h4>
                         <div class="collapse" id="payment">
                         <form action="action/update-order-histry.php?order_id=<?= $order_id?>" method="post">
                                <div class="form-group">
                                <select class="form-control" name="pay_status">
                                <option selected value="Pending"> Pending</option>
                                <option value="Processing"> Processing</option>
                                <option value="Shipped"> Shipped</option>
                                <option value="Complete"> Complete</option>
                                <option value="Cancel"> Cancel</option>
                                <option value="Return"> Return</option>
                            </select>
                            <div class="form-group">
                                <button type="submit" name="pay_update" class="btn btn-primary mt-2 col-md-12">Update</button>
                            </div>
                            </div>
                        </form>
                       </div>
                       <table class="table table-bordered">
                           <?php 
                               if($pay_details['payment_type'] == 'বিকাশ'){ ?>
                                  <tr>
                                   <th>Method: </th>
                                    <td><?= $pay_details['payment_type']?></td>
                                  </tr>
                                  <tr>
                                   <th>Number: </th>
                                    <td><?= $pay_details['bkash_number']?></td>
                                  </tr>
                                  <tr>
                                   <th>Transaction ID: </th>
                                    <td><?= $pay_details['bkash_tr_id']?></td>
                                  </tr>                                        
                                                                           
                               <?php }elseif($pay_details['payment_type'] == 'নগদ'){?>
                                  
                                   <tr>
                                   <th>Method: </th>
                                    <td><?= $pay_details['payment_type']?></td>
                                  </tr>
                                  <tr>
                                   <th>Number: </th>
                                    <td><?= $pay_details['nogod_number']?></td>
                                  </tr>
                                  <tr>
                                   <th>Transaction ID: </th>
                                    <td><?= $pay_details['nogod_tr_id']?></td>
                                  </tr>   
                                   
                                   
                               <?php }elseif($pay_details['payment_type'] == 'রকেট'){?>
                                  
                                  <tr>
                                   <th>Method: </th>
                                    <td><?= $pay_details['payment_type']?></td>
                                  </tr>
                                  <tr>
                                   <th>Number: </th>
                                    <td><?= $pay_details['roket_number']?></td>
                                  </tr>
                                  <tr>
                                   <th>Transaction ID: </th>
                                    <td><?= $pay_details['roket_tr_id']?></td>
                                  </tr>   
                                  
                               <?php }elseif($pay_details['payment_type'] == 'ক্যাশ অন ডেলিভারি'){
                                   echo '<td>'.$pay_details['payment_type'].'</td>';
                               }
                               ?>
                       </table>
                       
                   </div>
               </div><!----e nd ---->
           
               
               <!--- order details ----->
                <div class="card">
                   <div class="card-header bg-light">
                       <h4>Order <span class="text-danger">#<?= $odrSQL['invoice'];?></span> - Details</h4>
                   </div>
                   <div class="card-body">
                       <h4>Order Status: <span class="badge <?= $badg;?>"> <?= $odrSQL['order_status']?></span> <span class="float-right"><a data-toggle="collapse" href="#edit">Edit</a></span></h4>
                       <div class="collapse" id="edit">
                          <div class="card card-body">
                            <form action="action/update-order-histry.php?order_id=<?= $order_id?>" action="" method="post" >
                                <div class="form-group">
                                <select class="form-control" name="order_status">
                                <option selected value="Pending"> Pending</option>
                                <option value="Complete"> Complete</option>
                                <option value="Shipping"> Shipping</option>
                                <option value="Cancel"> Cancel</option>
                                <option value="Return"> Return</option>
                            </select>
                            <div class="form-group">
                                <button type="submit" name="order_status_btn" class="btn btn-primary mt-2 col-md-12">Update</button>
                            </div>
                            </div>
                            </form>
                          </div>
                        </div><!------ end ---->
                        
                        
                         <h4>Order Date & Time: 12-19-393 01:01:10</h4>
                         <hr>
                         <h4>Customer Name: <span>Nayon Talulder</span></h4>
                        <h4>Customer Email: <span>nayon@gmail.com</span></h4>
                        <h4>Customer Phone: <span>01814599587x</span></h4>
                    </div>
               </div><!----- end --->
               
               
               
               
                <div class="card">
                   <div class="card-header bg-light">
                       <h4>Send Invoice Cutomer Email</h4>
                   </div>
                   <div class="card-body">
                       <form action="action/send_invoice.php" method="post">
                          <input type="hidden" name="order_id" value="<?= $order_id;?>">
                          <input type="hidden" name="user_email" value="<?= $odrSQL['user_email'];?>">
                          <input type="hidden" name="user_name" value="<?= $odrSQL['user_name'];?>"> 
                          <input type="hidden" name="invoice" value="<?= $odrSQL['invoice'];?>">
                           <div class="form-group">
                               <label>Email Body</label>
                               <textarea class="form-control" name="msg_body"></textarea>
                           </div>
                           <div class="form-group">
                               <button class="btn btn-danger btn-rounded float-right" type="submit" name="send">Send</button>
                           </div>
                       </form>
                   </div>
               </div>
            
           </div>
        </div>
        
        <a href="invoice.php?order_id=<?= $order_id?>" class="btn btn-danger btn-rounded col-md-4 offset-md-4"> <i class="fa fa-print"></i> Print Invoice</a>
    </div>
    </div>
</div>
   
    
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>