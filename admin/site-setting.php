<?php 
include 'lib/db.php';
include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';
$chk = mysqli_query($conn, "SELECT * FROM `tbl_site_setting` ");
$check = mysqli_num_rows($chk);
$show = mysqli_fetch_assoc($chk);

if(isset($_POST['submit'])){
    $headeTx   = mysqli_real_escape_string($conn, $_POST['head_tex'] );
    $headeNum  = mysqli_real_escape_string($conn, $_POST['head_num'] );
    $fDes      = mysqli_real_escape_string($conn, $_POST['fDes'] );
    $fWrk      = mysqli_real_escape_string($conn, $_POST['fWrk'] );
    $fb        = mysqli_real_escape_string($conn, $_POST['fb'] );
    $inst      = mysqli_real_escape_string($conn, $_POST['inst'] );
    $ytb       = mysqli_real_escape_string($conn, $_POST['ytb'] );
    
    $insrt = mysqli_query($conn, "INSERT INTO `tbl_site_setting` (`id`, `header_tex`, `header_num`, `footer_des`, `footer_wrk`, `fb`, `inst`, `ytb`) VALUES (NULL, '$headeTx', '$headeNum', '$fDes', '$fWrk', '$fb', '$inst', '$ytb')");
    if($insrt == true){
        $success = '<div class="alert alert-success"><strong>Save Changes...</strong></div>';
    }else{
          echo 'worng';
    }
}
/// update 
                                                      
if(isset($_POST['edit'])){
    if(isset($_POST['head_tex'])){
        $head_tex  = mysqli_real_escape_string($conn, $_POST['head_tex']);  
    }

    $headeNum  = mysqli_real_escape_string($conn, $_POST['head_num'] );
    $fDes      = mysqli_real_escape_string($conn, $_POST['fDes'] );
    $fWrk      = mysqli_real_escape_string($conn, $_POST['fWrk'] );
    $fb        = mysqli_real_escape_string($conn, $_POST['fb'] );
    $inst      = mysqli_real_escape_string($conn, $_POST['inst'] );
     $ytb       = mysqli_real_escape_string($conn, $_POST['ytb'] );

    $sql = mysqli_query($conn, "UPDATE tbl_site_setting SET `header_tex`= '$head_tex', `header_num`='$headeNum', `footer_des`='$fDes', `footer_wrk`='$fWrk', `fb`='$fb', `inst`='$inst', `ytb`='$ytb'");
    if($sql == true){
        $success = '<div class="alert alert-success"><strong>Save Changes...</strong> <a href="site-setting.php" class="btn btn-info ">Reload</a></div>';
    }else{
          echo 'worng';
    }
}
?>       
       
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
<?php if(isset($success)) echo  $success;?>
<!-- ============================================================== -->
<!-- Main body contand  -->
<!-- ============================================================== -->
       <form action="" method="post"> 
           <div class="card">
               <div class="card-header">
               <h4>Header Setting</h4>
               </div>
               
               <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label>Header Text: </label>
                               <input value="<?= $show['header_tex']?>" type="text" name="head_tex" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label>Header Phone Number: </label>
                               <input value="<?= $show['header_num']?>" type="text" name="head_num" class="form-control">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           
           <div class="card">
               <div class="card-header">
                   <h4>Footer setting</h4>
               </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label>Short Description: </label>
                               <textarea class="form-control" name="fDes"><?= $show['footer_des']?></textarea>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label>Wordking Hours Details: </label>
                               <textarea class="form-control" name="fWrk"><?= $show['footer_wrk']?></textarea>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           
           
           <div class="card">
               <div class="card-header">
                   <h4>Manage Social Media</h4>
               </div>
                <div class="card-body">
                  <div class="form-group">
                       <label>Facebook Link: </label>
                       <input placeholder="https://facebook.com/your page" type="url" name="fb" value="<?= $show['fb']?>" class="form-control">
                   </div>
                   <div class="form-group">
                       <label>Instagram Link: </label>
                       <input placeholder="https://instagram.com/your page" type="url" name="inst"  value="<?= $show['inst']?>" class="form-control">
                   </div>
                   <div class="form-group">
                       <label>Youtube Link: </label>
                       <input placeholder="https://youtube.com/your chenel" type="url" name="ytb" value="<?= $show['ytb']?>" class="form-control">
                   </div>
                   
                   <div class="form-group">
                       <p>And more soacila site comming soon......</p>
                   </div>
                   
               </div>
           </div>
           <?php if($check < 0){?>
           <button type="submit" name="submit" class="btn btn-danger btn-rounded">Save Changes</button>
           <?php }else{?>
           <button type="submit" name="edit" class="btn btn-danger btn-rounded">Save Changes</button>
           <?php }?>
       </form>
       
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