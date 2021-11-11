<?php 


include 'lib/db.php';


//count cart item
if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
  session_start();
   
    if(isset($_SESSION['id'])){
         $user_id = $_SESSION['id'];
    
   $cunt = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE userID = '$user_id' ");
    $num = mysqli_num_rows($cunt);
    
    echo $num;
    }else{
        echo '0';
    }
}


?>