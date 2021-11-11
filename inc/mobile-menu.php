<!-- mobile menu -->
<div id="mobile-menu">
  <ul class="">
                <li><a href="ndex.php">Home</a>
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
                      <ul>
                       <?php
                          while($sub_catRow = mysqli_fetch_assoc($sub_cat)){
                          ?>
                        <li><a href="shop.php?sub_cat_id=<?php echo $sub_catRow['id'];?>"><span><?php echo $sub_catRow['sub_category'];?></span></a></li>
                        <?php } ?>
                      </ul>
                    
                  <?php } ?>
                </li>
                <?php } } ?>
                
                
             
                
              </ul>
</div>