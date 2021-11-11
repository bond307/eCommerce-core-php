<?php include 'inc/header.php';
include 'lib/db.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
if(isset($_GET['id'])){
    if(isset($_POST['update'])){
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        
        $result = mysqli_query($conn, "UPDATE `cash_on` SET details = '$details' WHERE id ='".$_GET['id']."'  ");
        if($result == true){
            $succ = '<div class="alert alert-success">Update Success....</div>';
        }
    }
   //-- ============================================================== -->
// show baksh data -->
// ============================================================== -->    
$cash_on = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cash_on WHERE id = '".$_GET['id']."' "));
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

<!-- ============================================================== -->
<!-- Main body contand  -->
<!-- ============================================================== -->
      <a href="set-payment.php" class="btn btn-danger btn-rounded mb-2 fa fa-angle-left"> Back</a>
      
      <?php if(isset($succ))echo $succ;?>
       <div class="card">
           <div class="card-header">
              
                   <strong>Cash On Delivery Setup</strong>
              
           </div>
           <div class="card-body">
               <form action="" method="post">
                    <div class="form-group">
                       <label>Payment Details: </label>
                       <textarea class="form-control" style="height:250px;" name="details"> <?= $cash_on['details'];?></textarea>
                   </div>
                   
                    <div class="form-group">
                       <button class="btn btn-danger btn-rounded col-md-4 offset-md-4" type="submit" name="update">Update</button>
                   </div>
               </form>
           </div>
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