<?php 
include 'lib/db.php';
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
<!-- Main body contand  -->
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
$reviewSQL = mysqli_query($conn, "SELECT * FROM `tbl_review` ");
        if(mysqli_num_rows($reviewSQL)>0){
            while($reviewinfo = mysqli_fetch_assoc($reviewSQL)){
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