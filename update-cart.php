<?php 
include 'lib/db.php';
// Set total price of the product in the cart table
	if (isset($_POST['qty'])){
	 echo  $qty    = $_POST['qty'];
	  echo $pid    = $_POST['pid'];
	  echo $pprice = $_POST['price'];

	 echo $tprice = $qty * $pprice;
        $update = mysqli_query($conn, "UPDATE `tbl_cart` SET qyt = '$qty', total = '$tprice' WHERE pid = '$pid' ");
        
	}


?>