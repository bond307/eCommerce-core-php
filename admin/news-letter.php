<?php 
include 'lib/db.php';
include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
    if(isset($_GET['delete_news'])){
         
        $delete = mysqli_query($conn, "DELETE FROM `tbl_news` WHERE id = '".$_GET['delete_news']."' ");
        if($delete == true){
            $succ = '<div class="alert alert-success">Email delete success...</div>';
        }
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
<?php if(isset($succ))echo $succ?>
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
                                        <th>Email</th>
                                        <th>Date & Time</th>
                                        <th>Acction</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
 $sr = '0';                                   //show product from order table
$tbl_news = mysqli_query($conn, "SELECT * FROM tbl_news");
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
    </div>
    
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>