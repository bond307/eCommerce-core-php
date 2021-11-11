<?php 
if(isset($_GET['delete_news'])){
         
        $delete = mysqli_query($conn, "DELETE FROM `tbl_news` WHERE id = '".$_GET['delete_news']."' ");
        if($delete == true){
            $succ = '<div class="alert alert-success">Email delete success...</div>';
        }
    }
include 'lib/db.php';
$date = date("d-m-Y");
//############################# secelct tottal order ##########################//
$sql = "SELECT COUNT(*) FROM `tbl_order`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$total_order = array_shift($row);

//############################# secelct today order ##########################//
$sql = "SELECT COUNT(*) FROM `tbl_order` WHERE order_date = '$date' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$today_order = array_shift($row);

//############################# secelct complete order ##########################//
$sql = "SELECT COUNT(*) FROM `tbl_order` WHERE order_status = 'Complete' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$complet_order = array_shift($row);

//############################# secelct tota erning ##########################//
$sql = "SELECT SUM(order_total_price) FROM `tbl_order` WHERE order_status = 'Complete' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$total_erning = array_shift($row);


?>