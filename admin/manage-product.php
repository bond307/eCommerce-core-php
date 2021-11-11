<?php include 'inc/header.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
 
?>
<?php include 'lib/db.php'; ?>
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';?>



<?php 
//delete product 
if(isset($_GET['delete_id'])){
    if(mysqli_query($conn, "DELETE FROM product WHere id = '".$_GET['delete_id']."' ")){
        echo '<script>window.location.replace("manage-product.php");</script>';
    }
}

//lock product
if(isset($_GET['producd_lock_id'])){
    if(mysqli_query($conn, "UPDATE product SET status = 'OFF' WHERE id = '".$_GET['producd_lock_id']."' ")){
        echo '<script>window.location.replace("manage-product.php");</script>';
    }
}
//Unlock product
if(isset($_GET['producd_unlock_id'])){
    if(mysqli_query($conn, "UPDATE product SET status = 'ON' WHERE id = '".$_GET['producd_unlock_id']."' ")){
        echo '<script>window.location.replace("manage-product.php");</script>';
    }
}

?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <strong>Manage Product</strong>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Invoic</th>
                                        <th>Images</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                    $sr = 0;
                                    $res = mysqli_query($conn, "SELECT * FROM `product` ORDER BY `product`.`id` DESC ");
                                    if(mysqli_num_rows($res) > 0){
                                        while($row = mysqli_fetch_assoc($res)){
                                            $sr++;
                                     
                                    ?>
                                    <tr>
                                        <td><?php echo $sr;?></td>
                                        <td><?php echo $row['invoice'];?></td>
                                        <td>
                                            <div class="m-r-10"><img src="images/product/fetcher-product/<?php echo $row['fetcher_img'];?>" alt="user" class="rounded" width="45"></div>
                                        </td>
                                        <td><?php echo $row['name'];?> </td>
                                        <td><?php echo $row['sPrice'];?> </td>
                                        <td>
                                           <?php 
                                            if($row['Reted_Product'] == 'Top Rated'){
                                                echo  '<span class="badge badge-primary">'.$row['Reted_Product'].'</span>';
                                            }
                                            
                                            if($row['Selling_Product'] == 'Best Selling'){
                                                 echo  '<span class="badge badge-warning">'.$row['Selling_Product'].'</span>';
                                            }
                                            
                                            ?>
                                           
                                           
                                        </td>
                                        <td>
                                            <?php 
                                            if($row['Stock'] == 'Out Of Stock'){
                                                  echo  '<span class="badge badge-danger">'.$row['Stock'].'</span>';
                                            }elseif($row['Stock'] == 'In Stock'){
                                                 echo  '<span class="badge badge-success">'.$row['Stock'].'</span>';
                                            }
                                            
                                           
                                            ?>
                                            
                                        </td>
                                        <td>

                                            <a target="_blank" href="../single_product.php?product_id=<?php echo $row['id'];?>" class="fa fa-eye mr-1"></a>
                                            <a href="edit-product.php?id=<?php echo $row['id'];?>"  class="fa fa-edit ml-1"></a>
                                            <a href="?delete_id=<?php echo $row['id'];?>" class="fa fa-trash ml-1"></a>
                                            
                                            <?php if($row['status'] == 'OFF'){ ?>
                                            <a style="color:#000;" href="?producd_unlock_id=<?php echo $row['id'];?>" class="fas fa-unlock-alt ml-1"></a>
                                            <?php }else{ ?>
                                            <a href="?producd_lock_id=<?php echo $row['id'];?>" class="fas fa-lock ml-1"></a>
                                            <?php } ?>
                                        </td>

                                    </tr>
<?php } }?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
<?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>