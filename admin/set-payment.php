<?php 
include 'inc/header.php';
include 'lib/db.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
// bkash locak 
    if(isset($_GET['bkash_lock_id'])){
        if(mysqli_query($conn, "UPDATE bkash SET status = 'ON' WHERE id = '".$_GET['bkash_lock_id']."' ")){
              echo '<script>window.location.reload:window.location.reload;</script>';
        }
    }
    
     if(isset($_GET['bkash_unlock_id'])){
        if(mysqli_query($conn, "UPDATE bkash SET status = 'OFF' WHERE id = '".$_GET['bkash_unlock_id']."' ")){ 
         echo '<script>window.location.reload:window.location.reload;</script>';
        }
    }
    
// ########################### nogod locak #############################//
if(isset($_GET['nogod_lock_id'])){
    if(mysqli_query($conn, "UPDATE nogod SET status = 'ON' WHERE id = '".$_GET['nogod_lock_id']."' ")){
          echo '<script>window.location.reload:window.location.reload;</script>';
    }
}

 if(isset($_GET['nogod_unlock_id'])){
    if(mysqli_query($conn, "UPDATE nogod SET status = 'OFF' WHERE id = '".$_GET['nogod_unlock_id']."' ")){ 
     echo '<script>window.location.reload:window.location.reload;</script>';
    }
}
// ########################### Roket locak #############################//
if(isset($_GET['roket_lock_id'])){
    if(mysqli_query($conn, "UPDATE roket SET status = 'ON' WHERE id = '".$_GET['roket_lock_id']."' ")){
          echo '<script>window.location.reload:window.location.reload;</script>';
    }
}

 if(isset($_GET['roket_unlock_id'])){
    if(mysqli_query($conn, "UPDATE roket SET status = 'OFF' WHERE id = '".$_GET['roket_unlock_id']."' ")){ 
     echo '<script>window.location.reload:window.location.reload;</script>';
    }
}
    
    // ########################### Roket locak #############################//
if(isset($_GET['cash_lock_id'])){
    if(mysqli_query($conn, "UPDATE cash_on SET status = 'ON' WHERE id = '".$_GET['cash_lock_id']."' ")){
          echo '<script>window.location.reload:window.location.reload;</script>';
    }
}

 if(isset($_GET['cash_unlock_id'])){
    if(mysqli_query($conn, "UPDATE cash_on SET status = 'OFF' WHERE id = '".$_GET['cash_unlock_id']."' ")){ 
     echo '<script>window.location.reload:window.location.reload;</script>';
    }
}
?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';?>       
       
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

<!-- ============================================================== -->
<!-- Main body contand  -->
<!-- ============================================================== -->
        <div class="card">
           <div class="card-header">
               <h4>Manage Order's</h4>
           </div>
           <div class="card-body">
              
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pay Name</th>
                                        <th>Pay Number</th>
                                        <th>Pay Info</th>
                                        <th>Pay Icon</th>
                                        <th>Acction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                               

<?php
$sr = '0';                                //show product from order table
$bkashSQL = mysqli_query($conn, "SELECT * FROM bkash ");
        if(mysqli_num_rows($bkashSQL)>0){
            while($bkashRow = mysqli_fetch_assoc($bkashSQL)){
                $sr++;
      ?>
      <tr>
          <td><?= $sr;?></td>
          <td><?= $bkashRow['bkash']?></td>
          <td><?= $bkashRow['number']?></td>
          <td><?= $bkashRow['bkash_details']?></td>
          <td><img src="https://www.logo.wine/a/logo/BKash/BKash-Icon-Logo.wine.svg" alt="" width="50"></td>
         
          <td>&nbsp; &nbsp;<a href="bkash-manage.php?id=<?= $bkashRow['id']?>" class="fa fa-edit"></a> 
          
          <?php if($bkashRow['status'] == 'ON'){ ?>
            <a style="color:#000;" href="?bkash_unlock_id=<?php echo $bkashRow['id'];?>" class="fas fa-unlock-alt ml-1"></a>
            <?php }else{ ?>
            <a href="?bkash_lock_id=<?php echo $bkashRow['id'];?>" class="fas fa-lock ml-1"></a>
          <?php }?>
            </td>
        
      </tr>
<?php } }?><!---- end bkash ------>
                    
<?php
$sr = '0';                                //show product from order table
$nogodSQL = mysqli_query($conn, "SELECT * FROM nogod ");
        if(mysqli_num_rows($nogodSQL)>0){
            while($nogodRow = mysqli_fetch_assoc($nogodSQL)){
                $sr++;
      ?>
      <tr>
          <td><?= $sr;?></td>
          <td><?= $nogodRow['nogod']?></td>
          <td><?= $nogodRow['number']?></td>
          <td><?= $nogodRow['nogod_details']?></td>
          <td><img src="https://download.logo.wine/logo/Nagad/Nagad-Logo.wine.png" alt="" width="50"></td>
         
          <td>&nbsp; &nbsp;<a href="nogod-manage.php?id=<?= $nogodRow['id']?>" class="fa fa-edit"></a> 
          
          <?php if($nogodRow['status'] == 'ON'){ ?>
            <a style="color:#000;" href="?nogod_unlock_id=<?php echo $nogodRow['id'];?>" class="fas fa-unlock-alt ml-1"></a>
            <?php }else{ ?>
            <a href="?nogod_lock_id=<?php echo $nogodRow['id'];?>" class="fas fa-lock ml-1"></a>
          <?php }?>
            </td>
        
      </tr>
<?php } }?><!--- end nogod---->
                    
                    <?php
$sr = '0';                                //show product from order table
$roketSQL = mysqli_query($conn, "SELECT * FROM roket ");
        if(mysqli_num_rows($roketSQL)>0){
            while($roketRow = mysqli_fetch_assoc($roketSQL)){
                $sr++;
      ?>
      <tr>
          <td><?= $sr;?></td>
          <td><?= $roketRow['roket']?></td>
          <td><?= $roketRow['number']?></td>
          <td><?= $roketRow['roket_details']?></td>
          <td><img src="https://www.metlife.com.bd/content/dam/metlifecom/bd/mobile-banking/rocket.png" alt="" width="50"></td>
         
          <td>&nbsp; &nbsp;<a href="roket-manage.php?id=<?= $roketRow['id']?>" class="fa fa-edit"></a> 
          
          
          <?php if($roketRow['status'] == 'ON'){ ?>
            <a style="color:#000;" href="?roket_unlock_id=<?php echo $roketRow['id'];?>" class="fas fa-unlock-alt ml-1"></a>
            <?php }else{ ?>
            <a href="?roket_lock_id=<?php echo $roketRow['id'];?>" class="fas fa-lock ml-1"></a>
          <?php }?>
            </td>
        
      </tr>
<?php } }?>
         <?php
$sr = '0';                                //show product from order table
$cashSQL = mysqli_query($conn, "SELECT * FROM cash_on ");
        if(mysqli_num_rows($cashSQL)>0){
            while($cashSQLRow = mysqli_fetch_assoc($cashSQL)){
                $sr++;
      ?>
      <tr>
          <td><?= $sr;?></td>
          <td colspan="2">Cash On Delivery</td>
          <td ><?= $cashSQLRow['details']?></td>
          <td><img src="https://i.pinimg.com/736x/a9/a0/0e/a9a00eb6fcd713fa39f9a0b7ab6e5342.jpg" alt="" width="50"></td>
         
          <td>&nbsp; &nbsp;<a href="cash-on-manage.php?id=<?= $cashSQLRow['id']?>" class="fa fa-edit"></a> 
          
          <?php if($cashSQLRow['status'] == 'ON'){ ?>
            <a style="color:#000;" href="?cash_unlock_id=<?php echo $cashSQLRow['id'];?>" class="fas fa-unlock-alt ml-1"></a>
            <?php }else{ ?>
            <a href="?cash_lock_id=<?php echo $cashSQLRow['id'];?>" class="fas fa-lock ml-1"></a>
          <?php }?>
            </td>
        
      </tr>
<?php } }?><!---- end bkash ------>             
                     
                     
                      
                                </tbody>
                            </table>
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