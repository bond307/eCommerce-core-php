<?php error_reporting(0); include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

?>
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';
include('lib/db.php');

//add color
if(isset($_POST['color_submit'])){
    $colorname = ' ';
    $colorcode = ' ';
    $coloSucc  = ' ';
    
    $colorname = $_POST['color_name'];
    $colorcode = $_POST['color_code'];
    
    //insert
    $color = mysqli_query($conn, "INSERT INTO `tbl_color`( `name`, `color_code`) VALUES ('$colorname','$colorcode')");
    if($color ==  true){
        $coloSucc = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Color add success.....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        echo '<script>window.location.href = "add-variation.php";</script>';
    }
}
//delete color
if( isset($_GET['delete_color'])) {
    $color_dlt = mysqli_query($conn, "DELETE FROM tbl_color WHERE id = '".$_GET['delete_color']."' ");
     if($color_dlt ==  true){
        $coloDlt = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Color has been deleted....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        echo '<script>window.location.href = "add-variation.php";</script>';
    }
}
///////////////// end color ////////////////



//add size
if(isset($_POST['size_submit'])){
    $size = ' ';
    $SizeSucc  = ' ';
    
    $size = $_POST['size'];
    
    //insert
    $color = mysqli_query($conn, "INSERT INTO `tbl_size`( `size`) VALUES ('$size')");
    if($color ==  true){
        $SizeSucc = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Size add success.....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        echo '<script>window.location.href = "add-variation.php";</script>';
    }
}
//delete color
if( isset($_GET['delete_size'])) {
    $color_dlt = mysqli_query($conn, "DELETE FROM tbl_size WHERE id = '".$_GET['delete_size']."' ");
     if($color_dlt ==  true){
        $sizeDlt = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Size has been deleted....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
       echo '<script>window.location.href = "add-variation.php";</script>';
    }
}



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
       <div class="row">
           <div class="col-md-6">
              <?php if(isset($coloSucc)) echo $coloSucc;?>
              <?php if(isset($coloDlt)) echo $coloDlt;?>
               <div class="card">
                  <div class="card-header">
                      <strong>Add Color: </strong>
                  </div>
                   <div class="card-body">
                       <form action="" method="post">
                           <div class="form-group">
                               <label>Color Name: </label>
                           <input required type="text" name="color_name" class="form-control">
                           </div>
                           
                            <div class="form-group">
                               <label>Color Code: </label>
                           <input required type="text" name="color_code" class="form-control" placeholder="#234bg3">
                           </div>
                           
                           <button class="btn btn-primary btn-rounded col-md-4 offset-md-4" type="submit" name="color_submit">Add Color</button>
                       </form>
                   </div><br>
                   
                   <div class="card-body">
                       <table class="table table-bordered">
                           <tr>
                               <th>SR No.</th>
                               <th>Color Name</th>
                               <th>Color code</th>
                               <th>Delete</th>
                           </tr>
                           <?php 
                           $sr = 0;
                           $colo_res = mysqli_query($conn, "SELECT * FROM `tbl_color` ");
                           if(mysqli_num_rows($colo_res)>0){
                               while($colorRows = mysqli_fetch_assoc($colo_res)){ $sr++ ?>
                            <tr>
                               <td><?= $sr ;?></td>
                               <td><?= $colorRows['name'] ;?></td>
                               <td><span style="background: <?= $colorRows['color_code']?>; " class="color-var"><?= $colorRows['color_code']?></span></td>
                               <td><a href="?delete_color=<?= $colorRows['id'] ;?>" class="text-center"><i class="fa fa-trash-alt"></i></a></td>
                           </tr>
                          <?php     }
                               
                           }else{
                               echo 'No color found...';
                           }
                           ?>
                           
                       </table>
                   </div>
                   
                   
               </div>
               
           </div><!--- color---->
           
          <div class="col-md-6">
              <?php if(isset($SizeSucc)) echo $SizeSucc;?>
              <?php if(isset($sizeDlt)) echo $sizeDlt;?>
               <div class="card">
                  <div class="card-header">
                      <strong>Add Size: </strong>
                  </div>
                   <div class="card-body">
                       <form action="" method="post">
                           <div class="form-group">
                               <label>Size: </label>
                           <input required type="text" placeholder="XL, LG, SM etc..." name="size" class="form-control">
                           </div>
                           
                         
                           
                           <button class="btn btn-primary btn-rounded col-md-4 offset-md-4" type="submit" name="size_submit">Add Size</button>
                       </form>
                   </div><br>
                   
                   <div class="card-body">
                       <table class="table table-bordered">
                           <tr>
                               <th>SR No.</th>
                               <th>Size</th>
                               <th>Delete</th>
                           </tr>
                           <?php 
                           $sr = 0;
                           $size_res = mysqli_query($conn, "SELECT * FROM `tbl_size` ");
                           if(mysqli_num_rows($size_res)>0){
                               while($sizeRows = mysqli_fetch_assoc($size_res)){ $sr++ ?>
                            <tr>
                               <td><?= $sr ;?></td>
                               <td><?= $sizeRows['size'] ;?></td>
                             
                               <td><a href="?delete_size=<?= $sizeRows['id'] ;?>" class="text-center"><i class="fa fa-trash-alt"></i></a></td>
                           </tr>
                          <?php     }
                               
                           }else{
                               echo 'No color found...';
                           }
                           ?>
                           
                       </table>
                   </div>
                   
                   
               </div>
               
           </div><!--- color---->
            
           
       </div>
       
        </div>
    </div>
    
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>