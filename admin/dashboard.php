<?php 
include 'lib/db.php';
include 'function.php';
include 'inc/header.php';



if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    

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

<!-- ============================================================== -->

        <div class="row">
                   
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Today Order's</h5>
                                        <h2 class="mb-0"> <?= $total_order;?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                        <i class="fa fa-shopping-cart fa-fw fa-sm text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Total Order's</h5>
                                        <h2 class="mb-0"> <?= $today_order?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        <i class="fa fa-shopping-basket fa-fw fa-sm text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Complete Sell</h5>
                                        <h2 class="mb-0"><?= $complet_order?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                        <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Total Earn</h5>
                                        <h2 class="mb-0"> ৳ <?= $total_erning?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
<!-- ============================================================== -->                  
        <div class="row">
            <div class="col-md-12">

<!-- ============================================================== -->
       <div class="card">
           <div class="card-header">
               <h4>Recent Order's</h4>
           </div>
           <div class="card-body">
              
        <table class="table table-striped table-bordered" style="width:100%">
            <thead class="dash-tbl-head">
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

$date = date('d-m-Y');                             //show product from order table
$orderSQL = mysqli_query($conn, "SELECT * FROM tbl_order ORDER BY `id` DESC LIMIT 0,10 ");
if(mysqli_num_rows($orderSQL)>0){
while($orderinfo = mysqli_fetch_assoc($orderSQL)){
if($orderinfo['order_status'] == 'Pending'){
$badg = 'badge-danger';
}elseif($orderinfo['order_status'] == 'Complete'){
$badg = 'badge-success';
}else{
$badg = 'badge-primary';
}
?>
<tr>
<td>#<?= $orderinfo['invoice']?></td>
<td><?= $orderinfo['order_date']?></td>
<td><?= $orderinfo['payment_type']?></td>
<td><?= $orderinfo['order_total_price']?></td>

<td><a href="" class="badge <?= $badg?>"><?= $orderinfo['order_status']?></a></td>
<td>&nbsp;&nbsp; &nbsp;<a href="single-order.php?view_order=<?= $orderinfo['id']?>" class="fa fa-eye"></a> </td>
</tr>
<?php } }?>

            </tbody>
        </table>
           </div>
       </div>
            </div>
            
        </div>
        
         <div class="row">
            <!-- ============================================================== -->     
            <div class="col-md-12">
             <div class="card">
           <div class="card-header">
               <h4>Recent Review's On You Product</h4>
           </div>
           <div class="card-body">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rate</th>
                                        <th>Nick Name</th>
                                        <th>Summary </th>
                                        <th>Review</th>
                                        <th>Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                $sr='0';                   //show product from order table
$sql =  "SELECT * FROM `tbl_review` ORDER BY `id` DESC";
 $res = mysqli_query($conn,$sql);       
while($reviewinfo = mysqli_fetch_assoc($res)){
$sr++;
?>
      <tr>
          <td><?= $sr;?></td>
          <td><?php
                               if($reviewinfo['ret'] == '1'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i>
                                   ';
                               }elseif($reviewinfo['ret'] == '2'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i>
                                   ';
                               }elseif($reviewinfo['ret'] == '3'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i>
                                   ';
                               }elseif($reviewinfo['ret'] == '4'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i>
                                   ';
                               }elseif($reviewinfo['ret'] == '5'){
                                   echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i>
                                   ';
                               }
                               ?></td>
          <td><?= $reviewinfo['nick']?></td>
          <td><?= $reviewinfo['sum']?></td>
          <td><?= $reviewinfo['rev']?></td>
          <td><a target="_blank" href="../single_product.php?product_id=<?= $reviewinfo['pid']?>" class="btn btn-danger">View Product</a></td>
          
      </tr>
      <?php }?>
                      
                                </tbody>
                            </table>
           </div>
       </div>
            </div> 
        </div>
        <div class="row">
            <!-- ============================================================== -->     
            <div class="col-md-6">
    <div class="card">
           <div class="card-header">
               <h4>Recent Subscriber</h4>
           </div>
           <div class="card-body">
              
                            <table class="table-responsive table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Date & Time</th>
                                        <th>Acction</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
 $sr = '0';                                   //show product from order table
$tbl_news = mysqli_query($conn, "SELECT * FROM tbl_news ORDER BY `tbl_news`.`id` DESC LIMIT 0,10");
        if(mysqli_num_rows($tbl_news)>0){
            while($newsinfo = mysqli_fetch_assoc($tbl_news)){
                $sr++;
      ?>
      <tr>
          <td><?= $sr++;?></td>
          <td><?= $newsinfo['email']?></td>
          <td><?= $newsinfo['date']?></td>
       
          <td>&nbsp;&nbsp; &nbsp;<a href="?delete_news=<?= $newsinfo['id']?>" class="fa fa-trash"></a> </td>
      </tr>
      <?php } }?>
                      
                    </tbody>
                </table>
           </div>
       </div>
            </div>
          <!-- ============================================================== -->
           <div class="col-md-6">
    <div class="card">
           <div class="card-header">
               <h4>Recent User</h4>
           </div>
           <div class="card-body">
              
                            <table class="table-responsive table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
 $sr = '0';                                   //show product from order table
$tbl_user = mysqli_query($conn, "SELECT * FROM `tbl_user` ORDER BY `tbl_user`.`id` DESC LIMIT 0,10 ");
        if(mysqli_num_rows($tbl_user)>0){
            while($userinfo = mysqli_fetch_assoc($tbl_user)){
                $sr++;
      ?>
      <tr>
          <td><?= $sr;?></td>
          <td><?= $userinfo['name']?></td>
          <td><?= $userinfo['email']?></td>
       
      </tr>
      <?php } }?>
                      
                    </tbody>
                </table>
           </div>
       </div>
            </div>  
        </div>
        
  <!-- ============================================================== -->     
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