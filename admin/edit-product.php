<?php include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
 
?>
<?php include 'lib/db.php';?>
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';?>
<?php 
if( isset($_GET['update'])){
    $success = '    <div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
  <strong>Product Update Success success</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

//get product id
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sr = 0;
$res = mysqli_query($conn, "SELECT * FROM `product` WHERE id = '$id' ");
if(mysqli_num_rows($res) > 0){
$row = mysqli_fetch_assoc($res);
    $pID = $row['id'];
    $prd1 = $row['prod1'];
    $prd2 = $row['prod2'];
    $prd3 = $row['prod3'];
    $prd4 = $row['prod3'];
    $fetcher = $row['fetcher_img'];
    $star = $row['reting'];
}

////////////// update /////////
if( isset($_POST['Update_product'])){
    
     $name         = mysqli_real_escape_string($conn, $_POST["name"]);
     $sprice       = mysqli_real_escape_string($conn, $_POST["sprice"]);
     $oprice       = mysqli_real_escape_string($conn, $_POST["oprice"]);
     $cat          = mysqli_real_escape_string($conn, $_POST["cat"]);
     $sub_cat      = mysqli_real_escape_string($conn, $_POST["sub_cat"]);
     $brand        = mysqli_real_escape_string($conn, $_POST["brand"]);
    
     $short_des    = mysqli_real_escape_string($conn, $_POST["short_des"]);
     $des          = mysqli_real_escape_string($conn, $_POST["des"]);
    
     
    if(isset($_POST["top_rate"]) && !empty($_POST["top_rate"])){
        $top = 'Top Rated';
    }else{
       $top = 'NO';
    }
    
    if(isset($_POST["best_selling"]) && !empty($_POST["best_selling"])){
        $best = 'Best Selling';
    }else{
        $best = 'NO';
    }

    if(isset($_POST["in_stock"]) && !empty($_POST["in_stock"])){
        $inStk = 'In Stock';
    }else{
        $inStk = 'Out Of Stock';
    }
    
  if(isset($_POST["vrb_or_not"]) && !empty($_POST["vrb_or_not"])){
        $vrblChk = $_POST["vrb_or_not"];
    }else{
       $vrblChk = 'NO';
    }
    
    if(isset($_POST["pColor"]) && !empty($_POST["pColor"])){
         $pColor = implode('-',$_POST["pColor"]);
    }else{
       $pColor = 'NO';
    }
    
    
    if(isset($_POST["pSize"]) && !empty($_POST["pSize"])){
          $pSize = implode('-',$_POST["pSize"]);
    }else{
       $pSize = 'NO';
    }
    
    $invoice = rand(000, 999);
    $date = date('M-d-Y');
    
    //check fetcher img is update or not
    if($_FILES['fetcherd']['name'] != ' ' ){
          //fetcher img
    $fetcherUP_name       = rand(000, 999).$_FILES['fetcherd']['name'];
    $fetcher_terget = 'images/product/fetcher-product/' . $fetcherUP_name;
    
        
        if(mysqli_query($conn, "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcherUP_name',`prod1` = '$prd1', `prod2` = '$prd2', `prod3` = '$prd3', `prod4` = '$prd4', `date` = '$date', `variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id'  ")){
            
            move_uploaded_file( $_FILES['fetcherd']['tmp_name'], $fetcher_terget);
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }else{
            echo 'something is worng';
        } 
    }else{
        if(mysqli_query($conn, $sql = "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcher',`prod1` = '$prd1', `prod2` = '$prd2', `prod3` = '$prd3', `prod4` = '$prd4', `date` = '$date',`variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id' ")){
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        
    }

//check product1 img is update or not
    if($_FILES['Prdouct_img1']['name'] != ' ' ){
          //fetcher img
    $prod1_name       = rand(000, 999).$_FILES['Prdouct_img1']['name'];
    $prod1_terget = 'images/product/product-img/' . $prod1_name;
    
        
        if(mysqli_query($conn, "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcher',`prod1` = '$prod1_name', `prod2` = '$prd2', `prod3` = '$prd3', `prod4` = '$prd4', `date` = '$date', `variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id'  ")){
            
            move_uploaded_file( $_FILES['Prdouct_img1']['tmp_name'], $prod1_terget);
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }else{
            echo 'something is worng';
        } 
    }else{
        if(mysqli_query($conn, $sql = "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcher',`prod1` = '$prd1', `prod2` = '$prd2', `prod3` = '$prd3', `prod4` = '$prd4', `date` = '$date', `variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id' ")){
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        
    }

    //check product2 img is update or not
    if($_FILES['Prdouct_img2']['name'] != ' ' ){
          //fetcher img
    $prod2_name       = rand(000, 999).$_FILES['Prdouct_img2']['name'];
    $prod2_terget = 'images/product/product-img/' . $prod2_name;
    
        
        if(mysqli_query($conn, "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcher',`prod1` = '$prd1', `prod2` = '$prod2_name', `prod3` = '$prd3', `prod4` = '$prd4', `date` = '$date', `variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id'  ")){
            
            move_uploaded_file( $_FILES['Prdouct_img2']['tmp_name'], $prod2_terget);
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }else{
            echo 'something is worng';
        } 
    }else{
        if(mysqli_query($conn, $sql = "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcher',`prod1` = '$prd1', `prod2` = '$prd2', `prod3` = '$prd3', `prod4` = '$prd4', `date` = '$date', `variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id' ")){
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        
    }
    
    //check product3 img is update or not
    if($_FILES['Prdouct_img3']['name'] != ' ' ){
          //fetcher img
   $prod3_name       = rand(000, 999).$_FILES['Prdouct_img3']['name'];
    $prod3_terget = 'images/product/product-img/'.$prod3_name;
    
        
        if(mysqli_query($conn, "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcher',`prod1` = '$prd1', `prod2` = '$prd2', `prod3` = '$prod3_name', `prod4` = '$prd4', `date` = '$date', `variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id'  ")){
            
            move_uploaded_file( $_FILES['Prdouct_img3']['tmp_name'], $prod3_terget);
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }else{
            echo 'something is worng';
        } 
    }else{
        if(mysqli_query($conn, $sql = "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcher',`prod1` = '$prd1', `prod2` = '$prd2', `prod3` = '$prd3', `prod4` = '$prd4', `date` = '$date', `variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id' ")){
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        
    }
    
    
    //check product3 img is update or not
    if($_FILES['Prdouct_img4']['name'] != ' ' ){
          //fetcher img
   $prod4_name       = rand(000, 999).$_FILES['Prdouct_img4']['name'];
    $prod4_terget = 'images/product/product-img/'.$prod4_name;
    
        
        if(mysqli_query($conn, "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcher',`prod1` = '$prd1', `prod2` = '$prd2', `prod3` = '$prd3', `prod4` = '$prod4_name', `date` = '$date', `variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id'  ")){
            
            move_uploaded_file( $_FILES['Prdouct_img4']['tmp_name'], $prod4_terget);
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }else{
            echo 'something is worng';
        } 
    }else{
        if(mysqli_query($conn, $sql = "UPDATE product SET `name` = '$name', `sPrice` = '$sprice', `oPrice` = '$oprice', `category` = '$cat' , `sub_category` = '$sub_cat' , `brand` = '$brand', `reting` = '$star', `short_des` = '$short_des' , `des` = '$des' , `Reted_Product` = '$top', `Selling_Product` = '$best', `Stock` = '$inStk', `fetcher_img` = '$fetcher',`prod1` = '$prd1', `prod2` = '$prd2', `prod3` = '$prd3', `prod4` = '$prd4', `date` = '$date', `variarble`='$vrblChk', `color`='$pColor', `size`='$pSize' WHERE id = '$id' ")){
            $update = '<div class="mt-2 mb-4 col-md-12 alert alert-success alert-dismissible fade show" role="alert">
          <strong>Product Update Success success</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        
    }
    
    }//end submit




?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <div class="row">
           <?php if(isset($update)) echo $update;?>
                <div class="bg-white pt-3 col-md-12 bg-warning">
                   
                    <h2 class="text-center text-white">Update Product </h2>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Product Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input placeholder="Product Name" type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
                                    </div>
                                    
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label>Sell Price</label>
                                                <input type="text" class="form-control" placeholder="৳: 1000" name="sprice" value="<?php echo $row['sPrice'];?>">
                                                
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label>Original Price</label>
                                                <input type="text" class="form-control" placeholder="৳: 1500" name="oprice" value="<?php echo $row['oPrice'];?>">
                                               
                                            </div>
                                        </div><br>
                                        
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label>Category </label>
                                                <select class="form-control" name="cat" id="cat" onchange="catfun()">
                                                 
                                                     <?php 
                                                       $category = mysqli_query($conn, "SELECT * FROM category  ORDER BY `category`.`id` DESC");
                                                          
                                                       if(mysqli_num_rows($category)>0){
                                                           while($catRow = mysqli_fetch_assoc($category)){
                                                
                                             
                                                               
                                                     if($catRow['id'] == $row['category']){
                                                       echo '<option selected value="'. $catRow['id'].'">'.$catRow['category'].'</option>'; 
                                                    }else{
                                                        echo '<option value="'. $catRow['id'].'">'.$catRow['category'].'</option>'; 
                                                    }            
                                                           
                                                           
                                                    } }?>
                                                    
                                                </select>
                                                
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label>Sub Category</label>
                                                <select class="form-control" name="sub_cat" id="sub_cat">
                                                   
                                                    <?php
                                                       $sub_category = mysqli_query($conn, "SELECT * FROM sub_category  ORDER BY `sub_category`.`id` DESC");
                                                          
                                                       if(mysqli_num_rows($sub_category)>0){
                                                           while($sub_row = mysqli_fetch_assoc($sub_category)){
                                                               
                                                               
                                                               
                                                   if($sub_row['id'] == $row['sub_category']){
                                                       echo '<option selected value="'. $sub_row['id'].'">'.$sub_row['sub_category'].'</option>'; 
                                                    }else{
                                                        echo '<option></option>'; 
                                                    } 
                                                     
                                                           
                                                           
                                                    } }?>
                                                </select>
                                               
                                            </div>
                                        </div><br>
                                        
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label>Brand</label>
                                                <select class="form-control" name="brand">
                                                    
                                                   <?php
                                                       $brand = mysqli_query($conn, "SELECT * FROM brand  ORDER BY `brand`.`id` DESC");
                                                          
                                                       if(mysqli_num_rows($brand)>0){
                                                           while($brand_row = mysqli_fetch_assoc($brand)){
                                                   
                                                    if( $brand_row['id'] == $row['brand']){
                                                       echo '<option selected value="'. $brand_row['id'].'">'.$brand_row['brand_name'].'</option>'; 
                                                    }else{
                                                        echo '<option value="'. $brand_row['id'].'">'.$brand_row['brand_name'].'</option>'; 
                                                    }       
                                                           
                                                           
                                                    } }?>
                                                </select>
                                                
                                            </div>
                                           
                                        </div><br>
                                        
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea class="form-control" placeholder="Short Description..." name="short_des" ><?php echo $row['short_des'];?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea style="height:250px;" class="form-control" placeholder="Product Description..." name="des"><?php echo $row['des'];?></textarea>
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
                                       <?php 
                                        if($row['Reted_Product'] == 'NO'){
                                            echo '<input id="ck2" name="top_rate" type="checkbox" data-parsley-multiple="groups" value="Top Rated" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label">Top Reted Product</span>';
                                        }else{
                                             echo '<input id="ck2" name="top_rate" type="checkbox" data-parsley-multiple="groups" value="Top Rated" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input" checked><span class="custom-control-label">Top Reted Product</span>';
                                        }
                                        ?>
                                        
                                    </label>
                                  </div>
                                  
                                   <div class="form-group">
                                        <?php 
                                        if($row['Selling_Product'] == 'NO'){
                                     
                                     echo '<label class="custom-control custom-checkbox">
                                    <input id="ck3" name="best_selling" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input" value="Best Selling"><span class="custom-control-label">Best Selling Product</span>
                                </label>';
                                   }else{
                                              
                                     echo '<label class="custom-control custom-checkbox">
                                    <input id="ck3" name="best_selling" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input" value="Best Selling" checked><span class="custom-control-label">Best Selling Product</span>
                                </label>'; 
                                        }
                                       
                                ?>
                                  </div>
                                  
                                  <div class="form-group">
                                     <?php
                                      if($row['Stock'] == 'In Stock'){
                                         echo '<label class="custom-control custom-checkbox">
                                    <input id="ck3" name="in_stock" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input" checked><span class="custom-control-label">In Stock</span>
                                </label>';       
    
                                    }else{
                                         echo '
                                         <label class="custom-control custom-checkbox">
                                    <input id="ck3" name="in_stock" type="checkbox" data-parsley-multiple="groups" data-parsley-mincheck="2" data-parsley-errors-container="#error-container1" class="custom-control-input"><span class="custom-control-label">In Stock</span>
                                </label>'; 
                                      }
                                      
                                      ?>
                                      
                                  </div>
                                </div>
                            </div>
                          
                            <div class="card product-img-update" >
                               <img src="images/product/fetcher-product/<?php echo $row['fetcher_img'];?>" class="img-thumbnail mb-4">
                                <div class="card-header pt-1">
                                
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
                            
                            <div class="card product-img-update">
                               <img src="images/product/product-img/<?php echo $row['prod1'];?>" width="100" height="100" class="img-thumbnail mb-2 mt-2 ml-5 col-md-8 col-md-8">
                               
                      
                                <div class="card-header pt-1">
                                    <h4>Update Product Image (1)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                      <div class="field" align="left">
                                            <input style="width:100%" type="file" name="Prdouct_img1" id="Prdouct_img1"  onchange="previewProdOne();">
                                        </div>
                                        <div class="fetcherd-img">
                                        <img class="img-thumbnail" id="Prdouct_img1_view" src="" alt="">
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="card product-img-update">
                               <img src="images/product/product-img/<?php echo $row['prod2'];?>" width="100" height="100" class="img-thumbnail  mb-2 mt-2 ml-5 col-md-8"> 
                            
                                <div class="card-header pt-1">
                                    <h4>Update Product Image (2)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                      <div class="field" align="left">
                                          <input style="width:100%" type="file" name="Prdouct_img2" id="Prdouct_img2"  onchange="previewProdTow();">
                                        </div>
                                        <div class="fetcherd-img">
                                        <img class="img-thumbnail" id="Prdouct_img2_view" src="" alt="">
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                             <div class="card product-img-update">
                               <img src="images/product/product-img/<?php echo $row['prod3'];?>" width="100" height="100" class="img-thumbnail  mb-2 mt-2 ml-5 col-md-8">
                                
                                <div class="card-header pt-1">
                                    <h4>Update Product Image (3)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                      <div class="field" align="left">
                                          <input style="width:100%" type="file" name="Prdouct_img3" id="Prdouct_img3"  onchange="previewProdThree();">
                                        </div>
                                        <div class="fetcherd-img">
                                        <img class="img-thumbnail" id="Prdouct_img3_view" src="" alt="">
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                             <div class="card product-img-update">
                               <img src="images/product/product-img/<?php echo $row['prod4'];?>" width="100" height="100" class="img-thumbnail  mb-2 mt-2 ml-5 col-md-8">
                                
                                <div class="card-header pt-1">
                                    <h4>Update Product Image (4)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                      <div class="field" align="left">
                                            <input style="width:100%" type="file" name="Prdouct_img4" id="Prdouct_img4"  onchange="previewProdfore();">
                                        </div>
                                        <div class="fetcherd-img">
                                        <img class="img-thumbnail" id="Prdouct_img4_view" src="" alt="">
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                          
                        </div>

                    </div>
                    
                      <div class="card">
                                <div class="card-bod pt-2 pb-2">
                                    <button class="btn btn-warning col-md-6 offset-md-3" type="submit" name="Update_product">Update Product</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
<!-- ============================================================== -->
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
<?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>

