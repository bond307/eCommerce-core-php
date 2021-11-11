<?php 
session_start();
require("lib/db.php");
require("function.php");
if(isset($_POST['pid'])){
     $pid = $_POST['pid'];
     $pname = $_POST['pname'];
     $pimg = $_POST['pimg'];
     $pprice = $_POST['pprice'];
     $ppinvoice = $_POST['ppinvoice'];
     $userID = $_POST['user_id'];
     
    
    if(isset($_POST['Qty'])){
        $Qty = $_POST['Qty'];
    }else{
        $Qty = '1';
    }
    
    //check color
    if(isset($_POST['color'])){
         $color = $_POST['color'];
    }else{
         $color = '0';
    }
    
    //check size
    if(isset($_POST['size'])){
         $size = $_POST['size'];
    }else{
         $size = '0';
    }
    
    
    
   $total = ($Qty*$pprice);
    
    
    //check catr page same product is able able or not
$check = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE userID = '$userID' AND invoice = '$ppinvoice'");
    if(mysqli_num_rows($check)>0){
        echo '<div class="alert alert-danger alert-dismissible  show" role="alert">
  <strong>Sorry!</strong> allready added in to cart
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }else{
        //insert
        $insrt = mysqli_query($conn, "INSERT INTO tbl_cart (pid, name, color, size, price, qyt, img, invoice, userID, total) VALUES ('$pid', '$pname', '$color', '$size', '$pprice', '$Qty', '$pimg', '$ppinvoice', '$userID', '$total' )");
        if($insrt == true){
            echo ' <div class="alert alert-success alert-dismissible show" role="alert">
  <strong>Success!</strong> Product add to cart
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }
    }
}

?>