<?php 
include 'lib/db.php';

if(isset($_POST['query'])){
    $getRes = $_POST['query'];
    $res = mysqli_query($conn, "SELECT * FROM product WHERE name like '%$getRes%' ");
     $rowcount= mysqli_num_rows($res);
    if($rowcount > 0) {
         while($row = mysqli_fetch_assoc($res)){
            echo '<li class="list-group-item"><img src="admin/images/product/fetcher-product/'.$row['fetcher_img'].'" width="50" alt=""><a href="single_product.php?search_result='.$row['id'].'">'.$row['name'].'</a><span class="pull-right m-t-10">৳ '.$row['sPrice'].'</span></li>';
        }
    }else{
          echo '<li style="    padding: 40px 50px;font-size: 18px;color: #FE6907;" class="list-group-item"> No Product found</li>';
    }
    
   
}

?>