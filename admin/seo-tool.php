<?php 
include 'lib/db.php';
include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';

$chk = mysqli_query($conn, "SELECT * FROM `tbl_seo`  ");                                                    
$show = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_seo` WHERE id= '1'"));
                                                                                           
if(isset($_POST['submit'])){
    
    $title     = mysqli_real_escape_string($conn, $_POST['title']);
    $tag       = mysqli_real_escape_string($conn, $_POST['tag']);
    $keyword   = mysqli_real_escape_string($conn, $_POST['keyword']);
    $des       = mysqli_real_escape_string($conn, $_POST['des']);
    
    if(mysqli_query($conn, "INSERT INTO tbl_seo (title, tag, keyw, des) VALUES ('$title', '$tag', '$keyword', '$des') ")){
        $succ = '<div class="alert alert-success"><strong>Success!</strong> All is set now...</div>';
    }
    
    
}
                                                      
////######################### update #########################// 
if(isset($_POST['edit'])){
    
    $title     = mysqli_real_escape_string($conn, $_POST['title']);
    $tag       = mysqli_real_escape_string($conn, $_POST['tag']);
    $keyword   = mysqli_real_escape_string($conn, $_POST['keyword']);
    $des       = mysqli_real_escape_string($conn, $_POST['des']);
    
    if(mysqli_query($conn, "UPDATE `tbl_seo` SET title = '$title', tag = '$tag', keyw = '$keyword', des ='$des' ")){
        $succ = '<div class="alert alert-success"><strong>Update Success!</strong> All is set now...</div>';
    }
    
    
}

?>       
       
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
<?php if(isset($succ)) echo $succ;?>
<!-- ============================================================== -->
<!-- Main body contand  -->
<!-- ============================================================== -->
       <div class="card">
           <div class="card-header">
               <h4>SEO Tools</h4>
           </div>
           <div class="card-body">
               <form action="" method="post">
                   <div class="form-group">
                       <label>Site Title</label>
                       <input value="<?= $show['title'];?>" class="form-control" name="title" type="text">
                   </div>
                   <div class="form-group">
                       <label>Meta Tag</label>
                       <input value="<?= $show['tag'];?>" class="form-control" name="tag" type="text" placeholder=" , , ,">
                   </div>
                   <div class="form-group">
                       <label>Meta Keyword</label>
                       <input value="<?= $show['keyw'];?>" class="form-control" name="keyword" type="text" placeholder=" , , ,">
                   </div>
                   <div class="form-group">
                       <label>Meta Description</label>
                      <textarea placeholder=", , , " class="form-control" style="height:200px" name="des"><?= $show['des'];?></textarea>
                   </div>
                   <div class="form-group">
                     <?php 
                       if(mysqli_num_rows($chk)<0){ ?>
                      <button class="btn btn-danger btn-rounded" type="submit" name="submit">Save</button>
                      <?php }else{ ?>
                       <button class="btn btn-danger btn-rounded" type="submit" name="edit">Edit</button>
                       <?php } ?>
                   </div>
               </form>
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