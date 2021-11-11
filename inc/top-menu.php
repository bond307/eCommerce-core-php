<?php session_start(); 
include 'lib/db.php';
$chk = mysqli_query($conn, "SELECT * FROM `tbl_site_setting` ");
$check = mysqli_num_rows($chk);
$show = mysqli_fetch_assoc($chk);
?>
       <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-md-4 col-xs-12"> 
              <!-- Default Welcome Message -->
              <div class="welcome-msg hidden-xs hidden-sm"><?= $show['header_tex'];?> </div>
              
            </div>
            
            <!-- top links -->
            <div class="headerlinkmenu col-md-8 col-sm-8 col-xs-12"> <span class="phone  hidden-xs hidden-sm">Call Us: <?= $show['header_num'];?> </span>
              <ul class="links">
               <?php 
                 
                if(isset($_SESSION['user_login']) && $_SESSION['user_login']=='yes') { ?>
               
                <!---<li>
                  <div class="dropdown"><a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span> <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="account_page.html">Account</a></li>
                      <li><a href="wishlist.html">Wishlist</a></li>
                      <li><a href="orders_list.html">Order Tracking</a></li>
                      <li><a href="about_us.html">About us</a></li>
                      <li class="divider"></li>
                      <li><a href="account_page.html">Log In</a></li>
                      <li><a href="register_page.html">Register</a></li>
                    </ul>
                  </div>
                </li>--->
                <li><a title="login" href="logout.php"><span>Logout</span></a></li>
                <?php }else{ ?>
                <li><a title="login" href="user_registration.php"><span>Registration</span></a></li>
                <li><a title="login" href="login.php"><span>Login</span></a></li><?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>