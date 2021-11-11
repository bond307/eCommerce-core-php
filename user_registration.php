<?php include('lib/db.php');?>
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
<?php include'inc/category.php';
$error = '';
$succ = '';

    
if(isset($_POST['submit'])){
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $error = ' <div class="alert alert-danger">
                     <strong>Name field is empty....</strong>
                 </div>';
    }
  
    
     //address
    if(isset($_POST['email']) && !empty($_POST['email'])){
          
        if($check = mysqli_query($conn, "SELECT email FROM `tbl_user` WHERE email = '".$_POST['email']."' ")){
            if(mysqli_num_rows($check)>0){
                $error = ' <div class="alert alert-danger">
                     <strong>This is already exist in our recourd....</strong>
                 </div>';
            }else{
                $email = $_POST['email'];  
            }
        }
    }else{
        $error = ' <div class="alert alert-danger">
                     <strong>Email field is empty....</strong>
                 </div>';
    }
    
    
    
    
    if(isset($_POST['pass']) && !empty($_POST['pass'])){
        
        if(strlen($_POST['pass']) >= 6){
            $pass = md5($_POST['pass']);
        }else{
              $error = ' <div class="alert alert-danger">
                     <strong>Password must be 6 characters or more....</strong>
                 </div>';
        }
        
    }else{
        $error = ' <div class="alert alert-danger">
                     <strong>Password field is empty....</strong>
                 </div>';
    }
    
    if(isset($name) && isset($pass) && isset($email) ){
  
    //sql 
    $res = mysqli_query($conn, "INSERT INTO `tbl_user` (`id`, `name`, `email`, `pass`) VALUES (NULL, '$name', '$email', '$pass')");
    
    if($res == true){
        $succ = ' <div class="alert alert-success">
                     <strong>Account create success. <a class="msg-btn" href="login.php">Log In</a></strong>
                 </div>';
    }
    }
    
}
    
    
    
?>

  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="page-content">
        <div class="account-login">
          <div class="col-md-3 col-sm-2"></div>
          <div class="col-md-6 col-sm-8 mt-5 mb-5">
            <div class="single-input p-bottom50 clearfix">
              <form action="" method="post" class="mt-5">
                <div class="row">
                <?php echo $error;?>
                <?php echo $succ;?>
                  <div class="col-xs-12">
                    <div class="check-title" style="margin:20px auto;">
                      <h4>New Customer</h4>
                    </div>
                  </div>
                
                  <div class="col-sm-12">
                    <label>Full Name:</label>
                    <div class="input-text">
                      <input type="text" name="name" class="form-control">
                     
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
                  
                    <div class="submit-text float-left" style="margin-top:20px; float:left">
                      <button class="button mt-5" type="submit" name="submit"><i class="fa fa-user"></i>&nbsp; <span>Register</span></button>
                    </div>
                    <div class="submit-text" style="margin-top:20px; float:right">
                      <a href="login.php" class="button-login mt-5" type="submit" name="submit"><i class="fa fa-user"></i>&nbsp; <span>Login</span></a>
                    </div>
                    
                   
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