<?php include 'inc/header.php';?>
<?php include 'lib/db.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

?>
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';?>
<?php 
if( isset($_GET['create_success'])){
$success = '    <div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
<strong>Product Added success</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
}



?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
<div class="dashboard-ecommerce">
<div class="container-fluid dashboard-content ">

<div class="row">
<?php if(isset($success)) echo $success;?>
    <div class="bg-white pt-3 col-md-12">

        <h2 class="text-center">Add New Product</h2>
    </div>
</div>

<div class="col-md-12 mt-3">
    <form action="action/product-upload.php" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input placeholder="Product Name" type="text" class="form-control" name="name" required>
                        </div>

                            <div class="form-row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label>Sell Price</label>
                                    <input type="text" class="form-control" placeholder="৳: 1000" name="sprice" required>

                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label>Original Price</label>
                                    <input type="text" class="form-control" placeholder="৳: 1500" name="oprice" required>

                                </div>
                            </div><br>

                            <div class="form-row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label>Category</label>
                                    <select class="form-control" name="cat" required id="cat" onchange="catfun()">
                                        <option value="" selected disabled>Select Product Category</option>
                                         <?php
                                           $category = mysqli_query($conn, "SELECT * FROM category  ORDER BY `category`.`id` DESC");

                                           if(mysqli_num_rows($category)>0){
                                               while($row = mysqli_fetch_assoc($category)){

                                        ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['category'];?></option>

                                        <?php } }?>

                                    </select>

                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label>Sub Category</label>
                                    <select class="form-control" name="sub_cat" id="sub_cat">
                                        <option value="">Select Product Category</option>
                                        

                                      
                                    </select>

                                </div>
                            </div><br>

                            <div class="form-row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label>Brand</label>
                                    <select class="form-control" name="brand" required>
                                        <option value="" selected disabled>Select Product Brand</option>
                                       <?php
                                           $brand = mysqli_query($conn, "SELECT * FROM brand  ORDER BY `brand`.`id` DESC");

                                           if(mysqli_num_rows($brand)>0){
                                               while($brand_row = mysqli_fetch_assoc($brand)){

                                        ?>
                                        <option value="<?php echo $brand_row['id'];?>"><?php echo $brand_row['brand_name'];?></option>

                                        <?php } }?>
                                    </select>

                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                    <label>Give Rating</label>
                                    <select class="form-control star" name="star" required>
                                        <option value="" selected disabled>Give Rating</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>

                                </div>
                            </div><br>

                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea class="form-control" placeholder="Short Description..." name="short_des" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea style="height:250px;" class="form-control" placeholder="Product Description..." name="des" required></textarea>
                            </div>

                    </div>
                </div>
                
                
                <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <label class="custom-control custom-checkbox">
        <input id="ck3" name="vrb_or_not" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input" value="Variable product"><span class="custom-control-label">Add variation product</span>
    </label>
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      
        <div class="">
        <div class="row">
        <div class="col-md-6">
            
            <div class="form-group">
                <label>Select Color</label>
                 <?php 
                 $colo_res = mysqli_query($conn, "SELECT * FROM `tbl_color` ");
                   if(mysqli_num_rows($colo_res)>0){
                ?>
                  <div class="form-group">
                   <?php while($colorRows = mysqli_fetch_assoc($colo_res)){ ?>
                    <label class="custom-control custom-checkbox">
                        <input id="ck3" name="pColor[]" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input" value="<?= $colorRows['color_code']?>"><span class="custom-control-label select-color" style="background:<?= $colorRows['color_code']?>;"><?= $colorRows['name']?></span>
                    </label>
                    <?php } ?>
                </div>
                <?php }else{
                      echo '<p class="text-danger"><b>Sorry! </b> Select Color form valiable</p>'; 
                   } ?>
            </div>
        </div>
        
        
        <div class="col-md-6">
            
            <div class="form-group">
                <label>Select Size</label>
                 <?php 
                       $size_res = mysqli_query($conn, "SELECT * FROM `tbl_size` ");
                           if(mysqli_num_rows($size_res)>0){
                              
                      ?>
                  <div class="form-group">
                   <?php  while($sizeRows = mysqli_fetch_assoc($size_res)){ ?>
                    <label class="custom-control custom-checkbox">
                        <input id="ck3" name="pSize[]" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input" value="<?= $sizeRows['size']?>"><span class="custom-control-label "><?= $sizeRows['size']?></span>
                    </label>
                    <?php }?>
                </div>
                <?php }?>
            </div>
            </div>
        </div>
        </div>
       
       
      </div>
    </div>
  </div>
</div>
                
            </div>

            <div class="col-md-4">
               <div class="card">

                    <div class="card-body">
                      <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input id="ck2" name="top_rate" type="checkbox" data-parsley-multiple="groups" value="Top Rated" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label">Top Reted Product</span>
                        </label>
                      </div>

                       <div class="form-group">
                          <label class="custom-control custom-checkbox">
                        <input id="ck3" name="best_selling" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input" value="Best Selling"><span class="custom-control-label">Best Selling Product</span>
                    </label>
                      </div>

                      <div class="form-group">
                          <label class="custom-control custom-checkbox">
                        <input id="ck3" name="in_stock" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label">In Stock</span>
                    </label>
                      </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header pt-1">
                        <h4>Upload Fetcherd Image</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input style="width:100%" type="file" name="fetcherd" id="fetcherd" accept="image/*" onchange="previewFetcherd();">
                        </div>
                        <div class="fetcherd-img">
                            <img class="img-thumbnail" id="fetcherd-img" src="" alt="">
                        </div>
                    </div>
                </div>

                <!---- preview Product One ---->
                <div class="card">
                    <div class="card-header pt-1">
                        <h4>Upload Product Image (1)</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input style="width:100%" type="file" name="Prdouct_img1" id="Prdouct_img1" onchange="previewProdOne();">
                        </div>
                        <div class="fetcherd-img">
                            <img class="img-thumbnail" id="Prdouct_img1_view" src="" alt="">
                        </div>
                    </div>
                </div>


                <!---- Preview Product 2 ---->
                <div class="card">
                    <div class="card-header pt-1">
                        <h4>Upload Product Image (2)</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input style="width:100%" type="file" name="Prdouct_img2" id="Prdouct_img2"  onchange="previewProdTwo();">
                        </div>
                        <div class="fetcherd-img">
                            <img class="img-thumbnail" id="Prdouct_img2_view" src="" alt="">
                        </div>
                    </div>
                </div>

                  <!---- Preview Product 3 ---->
                <div class="card">
                    <div class="card-header pt-1">
                        <h4>Upload Product Image (3)</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input style="width:100%" type="file" name="Prdouct_img3" id="Prdouct_img3"  onchange="previewProdThree();">
                        </div>
                        <div class="fetcherd-img">
                            <img class="img-thumbnail" id="Prdouct_img3_view" src="" alt="">
                        </div>
                    </div>
                </div>
                   <!---- Preview Product 3 ---->
                <div class="card">
                    <div class="card-header pt-1">
                        <h4>Upload Product Image (4)</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input style="width:100%" type="file" name="Prdouct_img4" id="Prdouct_img4"  onchange="previewProdfore();">
                        </div>
                        <div class="fetcherd-img">
                            <img class="img-thumbnail" id="Prdouct_img4_view" src="" alt="">
                        </div>
                    </div>
                </div>


            </div>

        </div>

          <div class="card">
                    <div class="card-bod pt-2 pb-2">
                        <button class="btn btn-success col-md-6 offset-md-3" type="submit" name="submit">Add Product</button>
                    </div>
                </div>
    </form>
</div>
</div>
</div>

<script>

    function catfun(){
        var cat = jQuery('#cat').val();
     
        jQuery.ajax({
            url: 'get_sub_cat.php',
            type: 'post',
            data: 'cat='+cat,
            success:function(result){
                jQuery('#sub_cat').html(result);
            }
        });
    }
    
</script>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>