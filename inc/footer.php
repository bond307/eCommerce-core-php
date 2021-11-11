 <?php 
include 'lib/db.php';
$chk = mysqli_query($conn, "SELECT * FROM `tbl_site_setting` ");
$check = mysqli_num_rows($chk);
$show = mysqli_fetch_assoc($chk);

?>
 
 <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3 col-xs-12">
          <div class="footer-logo"><a href="index.html"><img src="images/logo.png" alt="fotter logo"></a> </div>
          <p><?= $show['footer_des']?></p>
          <div class="social">
            <ul class="inline-mode">
              <li class="social-network fb"><a title="Connect us on Facebook" target="_blank" href="<?= $show['fb']?>"><i class="fa fa-facebook"></i></a></li>
              <li class="social-network googleplus"><a title="Connect us on Google+" target="_blank" href="<?= $show['footer_des']?>"><i class="fa fa-instagram"></i></a></li>
              <li class="social-network tw"><a title="Connect us on Twitter" target="_blank" href="<?= $show['footer_des']?>"><i class="fa fa-youtube"></i></a></li>
             
            </ul>
          </div>
        </div>
       
        <div class="col-sm-3 col-md-3 col-xs-12 collapsed-block col-md-offset-2">
          <div class="footer-links">
            <h3 class="links-title">Usefull Links<a class="expander visible-xs" href="#TabBlock-4">+</a></h3>
            <div class="tabBlock" id="TabBlock-4">
              <ul class="list-links list-unstyled">
                <li><a href="account.php">Account</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="shop.php">Shop</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 collapsed-block">
          <div class="footer-links">
            <h3 class="links-title">Working hours<a class="expander visible-xs" href="#TabBlock-5">+</a></h3>
            <div class="tabBlock" id="TabBlock-5">
              <div class="footer-description"><?= nl2br($show['footer_wrk'])?></div>
             
              <div class="payment">
                <ul>
                
                  <li><a href="#"><img title="Paypal" alt="Paypal" width="50" src="https://www.logo.wine/a/logo/BKash/BKash-Icon-Logo.wine.svg"></a></li>
                  <li><a href="#"><img title="Discover" alt="Discover" width="50"  src="https://download.logo.wine/logo/Nagad/Nagad-Logo.wine.png"></a></li>
                  <li><a href="#"><img title="Master Card" alt="Master Card" width="50"  src="https://www.metlife.com.bd/content/dam/metlifecom/bd/mobile-banking/rocket.png"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-coppyright">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-xs-12 coppyright"> Copyright © 2021 <a href="#"> kini24.com </a>. All Rights Reserved. <b>Design and Develop by NESOFT</b></div>
          <div class="col-sm-6 col-xs-12">
            <ul class="footer-company-links">
              <li> <a href="about.php">About</a> </li>
              <li> <a href="#">Privacy Policy</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a> 
  
  <!-- End Footer --> 
</div>

<!-- JS --> 

<!-- jquery js --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 

<!-- bootstrap js --> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 

<!-- owl.carousel.min js --> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 

<!-- jquery.mobile-menu js --> 
<script type="text/javascript" src="js/mobile-menu.js"></script> 

<!--cloud-zoom js --> 
<script type="text/javascript" src="js/cloud-zoom.js"></script> 

<!-- flexslider js --> 
<script type="text/javascript" src="js/jquery.flexslider.js"></script> 

<!--jquery-ui.min js --> 
<script type="text/javascript" src="js/jquery-ui.js"></script> 

<!-- main js --> 
<script type="text/javascript" src="js/main.js"></script> 

<!-- countdown js --> 
<script type="text/javascript" src="js/countdown.js"></script> 
<script type="text/javascript" src="js/custom.js"></script> 
<script type="text/javascript" src="js/jquery.dialogBox.js"></script> 

<!-- Slider Js --> 
<script type="text/javascript" src="js/revolution-slider.js"></script> 
<script type='text/javascript'>
        jQuery(document).ready(function(){
            jQuery('#rev_slider_4').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 865,
	            startheight: 450,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',
                
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
            
                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'off',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,
            
                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,
					

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
        </script>
</body>

<!-- Mirrored from htmlshopmart.justthemevalley.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Jan 2021 14:59:00 GMT -->
</html>
