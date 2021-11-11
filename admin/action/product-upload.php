<?php
require ('../lib/db.php');

if( isset($_POST['submit'])){
    
     $name         = mysqli_real_escape_string($conn, $_POST["name"]);
     $sprice       = mysqli_real_escape_string($conn, $_POST["sprice"]);
     $oprice       = mysqli_real_escape_string($conn, $_POST["oprice"]);
     $cat          = mysqli_real_escape_string($conn, $_POST["cat"]);
     $sub_cat      = mysqli_real_escape_string($conn, $_POST["sub_cat"]);
     $brand        = mysqli_real_escape_string($conn, $_POST["brand"]);
     $star         = mysqli_real_escape_string($conn, $_POST["star"]);
     $short_des    = mysqli_real_escape_string($conn, $_POST["short_des"]);
     $des          = mysqli_real_escape_string($conn, $_POST["des"]);
    
    
     
    if(isset($_POST["vrb_or_not"]) && !empty($_POST["vrb_or_not"])){
        $vrblChk = $_POST["vrb_or_not"];
    }else{
       $vrblChk = 'NO';
    }
    
    if(isset($_POST["pColor"]) && !empty($_POST["pColor"])){
        echo $pColor = implode('-',$_POST["pColor"]);
    }else{
       $pColor = 'NO';
    }
    
    
    if(isset($_POST["pSize"]) && !empty($_POST["pSize"])){
         echo $pSize = implode('-',$_POST["pSize"]);
    }else{
       $pSize = 'NO';
    }
    
    
    
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
     $in_stock      = mysqli_real_escape_string($conn, $_POST["in_stock"]);
    if(isset($_POST["in_stock"]) && !empty($_POST["in_stock"])){
        $inStk = 'In Stock';
    }else{
        $inStk = 'Out Of Stock';
    }
  
    
    
    //fetcher img
    $fetcher_name       = rand(000, 999).$_FILES['fetcherd']['name'];
    $fetcher_terget = '../images/product/fetcher-product/' . $fetcher_name;
    $fetcher_move = move_uploaded_file( $_FILES['fetcherd']['tmp_name'], $fetcher_terget);
    
    
   //prodcut -1
    $prd1       = rand(000, 999).$_FILES['Prdouct_img1']['name'];
    $prd1_tem = '../images/product/product-img/' . $prd1;
    $prd1_move = move_uploaded_file( $_FILES['Prdouct_img1']['tmp_name'], $prd1_tem);
    
    
     //prodcut -2
    $prd2       = rand(000, 999).$_FILES['Prdouct_img2']['name'];
    $prd2_tem = '../images/product/product-img/' . $prd2;
    $prd2_move = move_uploaded_file( $_FILES['Prdouct_img2']['tmp_name'], $prd2_tem);
    
      //prodcut -3
    $prd3       = rand(000, 999).$_FILES['Prdouct_img3']['name'];
    $prd3_tem = '../images/product/product-img/' . $prd3;
    $prd3_move = move_uploaded_file( $_FILES['Prdouct_img3']['tmp_name'], $prd3_tem);
    
      //prodcut -4
    $prd4       = rand(000, 999).$_FILES['Prdouct_img4']['name'];
    $prd4_tem = '../images/product/product-img/' . $prd4;
    $prd4_move = move_uploaded_file( $_FILES['Prdouct_img4']['tmp_name'], $prd4_tem);
    
    
    $invoice = rand(000000, 999999);
    $date = date('M-d-Y');
   

    
     if(isset($fetcher_move)){
    
    $result = mysqli_query($conn, "INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`) VALUES (NULL, '$invoice', '$name', '$sprice', '$oprice', '$cat', '$sub_cat', '$brand', '$star', '$short_des', '$des', '$top', '$best', '$inStk', '$fetcher_name', '$prd1', '$prd2', '$prd3', '$prd4', '$date', 'ON', '$vrblChk', '$pColor', '$pSize')");
    
    if($result == true){
          header("Location: ../add-product.php?create_success='success' ");
      
    }else{
        echo 'Something is worng';
    }
    } 
    
   
    
    
  
}











?>