<?php
require ('../lib/db.php');

//check order_id is set or not
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
}


//################################################################################////
//########################## order paymet status update #########################////
if(isset($_POST['pay_update'])){
    if(isset($_POST['pay_status']) && !empty($_POST['pay_status'])){
        $payUpSQL = mysqli_query($conn, "UPDATE tbl_order SET paymet_status = '".$_POST['pay_status']."' WHERE id = '$order_id' "); 
        if($payUpSQL == true){
            header("Location: ../single-order.php?view_order=$order_id");
        }
    }
    
}

//################################################################################////
//########################## order status update #########################////
if(isset($_POST['order_status_btn'])){
    if(isset($_POST['order_status']) && !empty($_POST['order_status'])){
        $odrUpSQL = mysqli_query($conn, "UPDATE tbl_order SET order_status = '".$_POST['order_status']."' WHERE id = '$order_id' "); 
        
        if($odrUpSQL == true){
            header("Location: ../single-order.php?view_order=$order_id");
        }
    }
    
}












?>