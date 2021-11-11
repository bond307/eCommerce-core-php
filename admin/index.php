<?php 
session_start();
include 'lib/db.php';
$error = '';
if(isset($_POST['submit'])){
    if(isset($_POST['user']) && !empty($_POST['user'])){
        $user = $_POST['user'];
    }
    if(isset($_POST['pass']) && !empty($_POST['pass'])){
        $pass = $_POST['pass'];
    }
    
    //check user is able able or not
    $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE user = '$user' AND pass = '$pass' " );
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['id'] = $row['id'];
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("Location: dashboard.php");
        }
    }else{
        $error = ' <div class="alert alert-danger">
    <strong>Something is worng! Try again</strong>
</div><br>';
    }
}

?>


<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
      <?php echo $error ;?>
        <div class="card ">
           
            <div class="card-header text-center"><a href="index.php"><img style="width:100%" class="logo-img" src="assets/images/logo.png" alt="logo"></a></div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" placeholder="Username" autocomplete="off" name="user">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="pass">
                    </div>
                  
                    <button type="submit" name="submit" class="btn btn-warning btn-lg btn-block">Sign in</button>
                </form>
            </div>
         
        </div>
    </div>
 
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script>
        //pop up
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
</body>
 
</html>