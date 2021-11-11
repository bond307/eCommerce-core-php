<?php include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
 
?>
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
error_reporting(0);
include 'inc/side-bar.php';
include 'lib/db.php';

if(isset($_POST['submit'])){
    $brand = mysqli_real_escape_string($conn, $_POST["brand"]);
    $brandImg = $_FILES['fetcherd']['name'];
    
    $moveImg = 'images/brand images/' . basename($_FILES["fetcherd"]["name"]);
    // Check if file already exists
    if (file_exists($moveImg)) {
    $error = '  <div class="alert alert-danger">
    <strong><span class="fa fa-exclamation-triangle"></span> Error!</strong> The category image is already exit! Please remane and upload....
    </div>';
    }
   
if(isset($brandImg) && isset($brand)){ 
    //Upload
    $result = mysqli_query($conn, "INSERT INTO brand (brand_name, brand_img) VALUES ('$brand', '$brandImg') ");
    if($result = true){
        
         $error = '<div class="alert alert-success">
    <strong><span class="fa fa-check"></span> Success!</strong> Brand Added...
    </div>';
        header("Refresh:0");
        
        move_uploaded_file( $_FILES['fetcherd']['tmp_name'], $moveImg);
    }
}
    

}

//delete
if(isset($_GET['id'])){
    
  if(mysqli_query($conn,  "DELETE FROM brand WHERE id='".$_GET['id']."'")){
      $delete = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Brand delete success</strong>
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
                                    <label>Brand Name</label>
                                    <input name="brand" type="text" class="form-control" required>
                                </div><br>

                                <div class="catagory-img">
                                    <div class="form-group">
                                        <label>Brand Images</label>
                                        <input style="width:100%" type="file" name="fetcherd" id="fetcherd" accept="image/*" onchange="previewFetcherd(); required">
                                    </div>
                                    <div class="fetcherd-img">
                                        <img class="img-thumbnail" id="fetcherd-img" src="" alt="">
                                    </div>
                                </div><br>


                                <button type="submit" name="submit" class="col-md-4 offset-md-4 btn btn-success">Add Brand</button>
                            </div>
                        </div>


                    </form>
                </div>


                <div class="col-md-7">
                    <div class="bg-white pt-3 pb-1">
                        <h4 class="text-center">Brand Manage</h4>
                    </div><br>

                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">#</th>
                                            <th class="border-0">Brnad Name</th>
                                            <th class="border-0">Brand Images</th>
                                            <th class="border-0">Acction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                       $show = mysqli_query($conn, "SELECT * FROM brand  ORDER BY `brand`.`id` DESC");
                                            $sr = 0;
                                       if(mysqli_num_rows($show)>0){
                                           while($row = mysqli_fetch_assoc($show)){
                                          $sr++; 
                                    ?>
                                        <tr>
                                            <td><?php echo $sr;?></td>
                                            <td><?php echo $row['brand_name'];?></td>
                                            <td>
                                                <div class="m-r-10"><img src="images/brand%20images/<?php echo $row['brand_img'];?>" alt="user" class="rounded" width="45"></div>
                                            </td>
                                           <td>
                                                 <a href="?id=<?php echo $row['id']?>" class="fa fa-trash ml-4"></a>
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
<!-- ============================================================== -->
<?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>