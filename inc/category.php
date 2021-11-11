<?php require('lib/db.php');?>
  <nav>
    <div class="container">
      <div class="row">
        <div class="mm-toggle-wrap" onclick="category()">
          <div class="mm-toggle"><i class="fa fa-align-justify"></i> </div>
          <span class="mm-label">All Categories</span> </div>
        <div class="col-md-3 col-sm-3 mega-container hidden-xs">
          <div class="navleft-container">
            <div class="mega-menu-title">
              <h3><span>All Categories</span></h3>
            </div>
            
            <!-- Shop by category -->
            <div class="mega-menu-category" id="myDIV">
              <ul class="nav">
                
               <?php
                  $cat = mysqli_query($conn, "SELECT * FROM category");
                  if(mysqli_num_rows($cat) > 0){
                      while($catRow = mysqli_fetch_assoc($cat)){
                          
                          
             ?>
                <li><a href="shop.php?cat_id=<?php echo $catRow['id'];?>"><?php echo $catRow['category'];?></a>
                 
                 <?php 
                    $sub_cat = mysqli_query($conn, "SELECT * FROM sub_category WHERE category_id = '".$catRow['id']."'");
                  if(mysqli_num_rows($sub_cat) > 0){
                      
                  
                ?>
                  <div class="wrap-popup column1">
                    <div class="popup">
                      <ul class="nav">
                       <?php
                          while($sub_catRow = mysqli_fetch_assoc($sub_cat)){
                          ?>
                        <li><a href="shop.php?sub_cat_id=<?php echo $sub_catRow['id'];?>"><span><?php echo $sub_catRow['sub_category'];?></span></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                  <?php } ?>
                </li>
                <?php } } ?>
                
                
             
                
              </ul>
            </div>
          </div>
        </div>
        
        
     <?php include'inc/menu-bar.php';?>
      </div>
    </div>
  </nav>
  
 <script>

function category() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>