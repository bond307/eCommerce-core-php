<?php include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

error_reporting(0);
include 'inc/side-bar.php';
include 'lib/db.php';

if(isset($_POST['submit'])){
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $CaImg = $_FILES['fetcherd']['name'];
    $CaIcon = $_FILES['icon']['name'];
    $CaBanner = $_FILES['banner']['name'];
    
    $moveImg = 'CategoryImage/CategoryImg/' . basename($_FILES["fetcherd"]["name"]);
    
    $moveIcon = 'CategoryImage/CategoryIcon/' . basename($_FILES["icon"]["name"]);
    $moveBanner = 'CategoryImage/CategoryBanner/' . basename($_FILES["banner"]["name"]);
    
    // Check if file already exists
    if (file_exists($moveImg)) {
    $error = '  <div class="alert alert-danger">
    <strong><span class="fa fa-exclamation-triangle"></span> Error!</strong> The category image is already exit! Please remane and upload....
    </div>';
    }
    // Check if file already exists
    if (file_exists($moveIcon)) {
    $error = '  <div class="alert alert-danger">
    <strong><span class="fa fa-exclamation-triangle"></span> Error!</strong> The category Icon is already exit! Please remane and upload....
    </div>';
    }
    // Check if file already exists
    if (file_exists($moveBanner)) {
    $error = '  <div class="alert alert-danger">
    <strong><span class="fa fa-exclamation-triangle"></span> Error!</strong> The category Banner is already exit! Please remane and upload....
    </div>';
    }
if(isset($CaImg) && isset($CaIcon) && isset($CaBanner)){ 
    //Upload
    $result = mysqli_query($conn, "INSERT INTO category (category, img, icon, banner 	) VALUES ('$category', '$CaImg', '$CaIcon', '$CaBanner') ");
    if($result = true){
        
         $error = '<div class="alert alert-success">
    <strong><span class="fa fa-check"></span> Success!</strong> Category Added...
    </div>';
        header("Refresh:0");
        
        move_uploaded_file( $_FILES['fetcherd']['tmp_name'], $moveImg);
        move_uploaded_file( $_FILES['icon']['tmp_name'], $moveIcon);
        move_uploaded_file( $_FILES['banner']['tmp_name'], $moveBanner);
    }
}
    

}

//delete
if(isset($_GET['id'])){
    
  if(mysqli_query($conn,  "DELETE FROM category WHERE id='".$_GET['id']."'")){
      $delete = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Category delete success</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }  
    
    
}

?>

<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
<?php if(isset($delete)) echo $delete?>
            <div class="row">
              
                <div class="col-md-5">
                    <div class="bg-white pt-3 pb-1">
                        <h4 class="text-center">Add Category</h4>
                    </div><br>
                  <?php if(isset($error))echo $error;?>
                    <form action="" method="post"  enctype="multipart/form-data" >
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input name="category" type="text" class="form-control" required>
                                </div><br>

                                <div class="catagory-img">
                                    <div class="form-group">
                                        <label>Category Images</label>
                                        <input style="width:100%" type="file" name="fetcherd" id="fetcherd" accept="image/*" onchange="previewFetcherd(); required">
                                    </div>
                                    <div class="fetcherd-img">
                                        <img class="img-thumbnail" id="fetcherd-img" src="" alt="">
                                    </div>
                                </div><br>

                                <div class="catagory-img">
                                    <div class="form-group">
                                        <label>Category Icon</label>
                                        <input style="width:100%" type="file" name="icon" id="icon" accept="image/*" onchange="iconFetcherd();" required>
                                    </div>
                                    <div class="fetcherd-img">
                                        <img class="img-thumbnail" id="icon-img" src="" alt="">
                                    </div>
                                </div>
                                <div class="catagory-img">
                                    <div class="form-group">
                                        <label>Category Banner</label>
                                        <input style="width:100%" type="file" name="banner" id="banner" accept="image/*" onchange="bannerPre();" required>
                                    </div>
                                    <div class="fetcherd-img">
                                        <img class="img-thumbnail" id="banner-img" src="" alt="">
                                    </div><br><br>
                                </div>

                                <button type="submit" name="submit" class="col-md-4 offset-md-4 btn btn-success">Add Category</button>
                            </div>
                        </div>


                    </form>
                </div>


                <div class="col-md-7">
                    <div class="bg-white pt-3 pb-1">
                        <h4 class="text-center">Category Manage</h4>
                    </div><br>

                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">#</th>
                                            <th class="border-0">Image</th>
                                            <th class="border-0">Icon</th>
                                            <th class="border-0">Banner</th>
                                            <th class="border-0">Name</th>
                                            <th class="border-0">Acction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                       $show = mysqli_query($conn, "SELECT * FROM category  ORDER BY `category`.`id` DESC");
                                            $sr = 0;
                                       if(mysqli_num_rows($show)>0){
                                           while($row = mysqli_fetch_assoc($show)){
                                          $sr++; 
                                    ?>
                                        <tr>
                                            <td><?php echo $sr;?></td>
                                            <td>
                                                <div class="m-r-10"><img src="CategoryImage/CategoryImg/<?php echo $row['img'];?>" alt="user" class="rounded" width="45"></div>
                                            </td>
                                            <td>
                                                 <div class="m-r-10"><img src="CategoryImage/CategoryIcon/<?php echo $row['icon'];?>" alt="user" class="rounded" width="45"></div>
                                            </td>
                                            <td>
                                                 <div class="m-r-10"><img src="CategoryImage/CategoryBanner/<?php echo $row['banner'];?>" alt="user" class="rounded" width="45"></div>
                                            </td>
                                            <td><?php echo $row['category'];?> </td>
                                            <td>
                                                 <a href="add-category.php?id=<?php echo $row['id']?>" class="fa fa-trash ml-4"></a>
                                            </td>
                                            
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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