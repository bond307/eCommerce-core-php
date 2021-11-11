<?php 
$conn = mysqli_connect('localhost', 'root', '', 'ecommerce');


$colo_res  = mysqli_query($conn, "SELECT * FROM `tbl_color` ");
$color_num = (mysqli_num_rows($colo_res)>0);
$colorRows = mysqli_fetch_assoc($colo_res);


$colo_res  = mysqli_query($conn, "SELECT * FROM `tbl_color` ");
$color_num = mysqli_num_rows($colo_res);
$colorRows = mysqli_fetch_assoc($colo_res);

$size_res = mysqli_query($conn, "SELECT * FROM `tbl_size` ");
$siz_num = mysqli_num_rows($size_res);
$sizeRows = mysqli_fetch_assoc($size_res);


?>