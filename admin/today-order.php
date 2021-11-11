<?php include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
  
?>
<?php include 'lib/db.php';?>
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';



?>       
       
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

<!-- ============================================================== -->
<!-- Main body contand  -->
<!-- ============================================================== -->
       <div class="card">
           <div class="card-header">
               <h4>Manage Order's</h4>
           </div>
           <div class="card-body">
              
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
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
$orderSQL = mysqli_query($conn, "SELECT * FROM tbl_order WHERE order_date = '$date' ");
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
          <td><?= $orderinfo['invoice']?></td>
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
    
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>