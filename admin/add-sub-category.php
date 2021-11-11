<?php include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

?>
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';
error_reporting(0);
include 'lib/db.php';
//join



///Submit sub category 

if(isset($_POST['submit'])){
    
    $SubCategory = mysqli_real_escape_string($conn, $_POST["subCat"]);
    $perCat = $_POST["perCat"];
    
    if(isset($SubCategory) && isset($perCat)){
        $result = mysqli_query($conn, "INSERT INTO sub_category (category_id, sub_category)VALUES ('$perCat', '$SubCategory' )  ");
        if($result == true){
            $succe = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sub Category upload success...</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
             header("Refresh:0");
        }
    }
    
    
}

//delete
if(isset($_GET['id'])){
    
  if(mysqli_query($conn,  "DELETE FROM sub_category WHERE id='".$_GET['id']."'")){
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
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <div class="row">
                <div class="col-md-5">
                   
                    <div class="bg-white pt-3 pb-1">
                        <h4 class="text-center">Add Sub Category</h4>
                    </div><br>
                    <?php if(isset($succe)) echo $succe;?>
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sub Category Name</label>
                                    <input type="text" class="form-control" name="subCat" required>
                                </div>
                                 <div class="form-group">
                                    <label>Parent Category</label>
                                    <select class="form-control" name="perCat" required>
                                       
                                        <option value="" selected disabled>Select parent category</option>
                                <?php 
                                    $showCat = mysqli_query($conn, "SELECT * FROM `category` ORDER BY `id` DESC ");
                                    if(mysqli_num_rows($showCat) > 0){
                                        while($rowCat = mysqli_fetch_assoc($showCat)){
                                            echo '<option value="'.$rowCat['id'].'">'.$rowCat['category'].'</option>';
                                        }
                                    }
                                    ?>
                                       
                                    </select>
                                </div><br>

                                

                                <button type="submit" name="submit" class="col-md-6 offset-md-3 btn btn-success">Add Sub Category</button>
                            </div>
                        </div>


                    </form>
                </div>


                <div class="col-md-7">
                    <div class="bg-white pt-3 pb-1">
                        <h4 class="text-center">Sub Category Manage</h4>
                    </div><br>

                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">#</th>
                                            <th class="border-0">Sub Cateogry</th>
                                            <th class="border-0">Parent Cateogry</th>
                                            <th class="border-0">Acction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       
                                    $showSub = mysqli_query($conn, "SELECT sub_category.id, sub_category.sub_category, category.category from sub_category, category where sub_category.category_id = category.id ORDER BY sub_category.id ");
                                    if(mysqli_num_rows($showSub) > 0){
                                        
                                        while($rowsubCat = mysqli_fetch_assoc($showSub)){
                                          
                                        $sr = 0;
                                    $sr++
                                    ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $rowsubCat['sub_category']?></td>
                                            <td><?php echo $rowsubCat['category']?></td>
                                            <td>
                                           
                                                 <a href="add-sub-category.php?id=<?php echo $rowsubCat['id']?>" class="fa fa-trash ml-4"></a>
                                           
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