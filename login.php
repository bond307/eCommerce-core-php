<?php 
error_reporting(0);
session_start();
include('lib/db.php');
$error = '';
if(isset($_POST['submit'])){
   if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $error = ' <div class="alert alert-danger">
                     <strong>email field is empty....</strong>
                 </div>';
    }
     if(isset($_POST['pass']) && !empty($_POST['pass'])){
        $pass = md5($_POST['pass']);
    }else{
        $error = ' <div class="alert alert-danger">
                     <strong>Password field is empty....</strong>
                 </div>';
    }
    
    
    if(isset($email) && isset($pass)){
        $res = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email' AND pass = '$pass' ");
        
        if($res == true){
           if(mysqli_num_rows($res) > 0){
              $row = mysqli_fetch_assoc($res);
                   $_SESSION['user_login'] = 'yes';
                   $_SESSION['id'] = $row['id'];
                   $_SESSION['name'] = $row['name'];
                   $_SESSION['email'] = $row['email'];
                   header("Location: index.php");
           
           }else{
              $error = '<div class="alert alert-danger">
                     <strong>Sorry! we can not find you...</strong>
                 </div>'; 
           }
        }
    }
    
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Basic page needs -->
<meta charset="utf-8">
<!--[if IE]>
<?php include 'inc/meta.php';?>

<!-- Mobile specific metas  -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon  -->
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<!-- CSS Style -->

<link rel="stylesheet" href="style.css">
</head>

<body class="shop_grid_page">
<?php include 'inc/mobile-menu.php';?>
<!-- end mobile menu -->
<div id="page"> 
  
  <!-- Header -->
  <header>
<div class="header-container">
<?php include 'inc/top-menu.php';?>    
      <!-- header inner -->
<?php include 'inc/main-menu.php';?>  
    </div>
  </header>
  <!-- end header -->
<?php include'inc/category.php';?>





  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="page-content">
        <div class="account-login">
          <div class="col-md-3 col-sm-2"></div>
          <div class="col-md-6 col-sm-8 mt-5 mb-5">
            <div class="single-input p-bottom50 clearfix">
              <form action="" method="post" class="mt-5">
               <?php echo $error;?>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="check-title text-center" style="margin:20px auto;">
                      <h4>Login</h4>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <label>Email:</label>
                    <div class="input-text">
                      <input type="eamil" name="email" class="form-control">
                    </div>
                  </div>
                
                    <div class="col-sm-12">
                    <label>Password:</label>
                    <div class="input-text">
                      <input type="password" name="pass" class="form-control">
                    </div>
                  </div>
                  <div class="col-xs-12">
                  
                    <div class="submit-text pull-left" style="margin-top:20px;">
                      <button class="button mt-5" type="submit" name="submit"><i class="fa fa-user"></i>&nbsp; <span>Login</span></button>
                    </div>
                    <a class="pull-right" style="margin-top:30px;" href="user_registration.php">I have no account</a>
                  </div>
                  
                   
                </div>
                
              </form>
            </div>
             
          </div>
        </div>
      </div>
    </div>
  </section>


<?php include'inc/footer.php';?>