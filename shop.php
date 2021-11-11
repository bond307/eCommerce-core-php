<?php

include 'lib/db.php';

if(isset($_POST['submit_range'])){
 $min=$_POST['min'];
$max=$_POST['max'];
    
$allProd = mysqli_query($conn, "SELECT * FROM product WHERE sPrice <=".$max);
   
}elseif(isset($_GET['cat_id'])){
$cat_id = $_GET['cat_id'];
$allProd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON' AND category = '".$_GET['cat_id']."' ");

//show category accroding product cat_id     

}elseif(isset($_GET['sub_cat_id'])){
    
$sub_car_id = $_GET['sub_cat_id'];
$allProd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON' AND sub_category = '$sub_car_id' ");
    
}elseif(isset($_GET['latest'])){
   $allProd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON' ORDER BY `product`.`id` DESC "); 
    

}  else{
$allProd = mysqli_query($conn, "SELECT * FROM product WHERE status = 'ON' ");

}
$results_per_page = 12;
 $countProduct = mysqli_num_rows($allProd);
// determine number of total pages available
 $number_of_pages = ceil($countProduct/$results_per_page);
// determine which page number visitor is currently on
$curent_page = 1;
if (!isset($_GET['page'])) {
  $page = 1;

} else {
  $page = $_GET['page'];
    $curent_page = $page;
}
// determine the sql LIMIT starting number for the results on the displaying page
$first_result = ($page-1)*$results_per_page;
// retrieve selected results from database and display them on page
$sql="SELECT * FROM product WHERE status = 'ON' ORDER BY `product`.`id` DESC LIMIT $first_result,$results_per_page";
$allProd = mysqli_query($conn, $sql);

// max value
$max= mysqli_query($conn, "SELECT MAX( `sPrice` ) AS max FROM product WHERE status = 'ON' ");
$maxVal = mysqli_fetch_array($max);

// max value
$min= mysqli_query($conn, "SELECT MIN( `sPrice` ) AS min FROM product WHERE status = 'ON' ");
$minVal = mysqli_fetch_array($min);


?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Basic page needs -->
<meta charset="utf-8">
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

<!---################################## Check ################## -->
<?php 
$addCart='';
$addCartReqst='';
if(isset($_SESSION['user_login']) && ($_SESSION['user_login'] == 'yes') && isset($_SESSION['id'])){
    $addCart = 'cart';
    $useri_id = $_SESSION['id'];
}else{
    $addCartReqst = 'data-toggle="modal" data-target="#login_requst"';
    echo '
<div class="modal fade modal-dialog-centered" id="login_requst" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <img style="width: 150px; margin: 10px auto;margin-left: 200px;" src="images/sad.gif">
        <h5 class="modal-title text-center" id="exampleModalLabel">Please Login First</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="login.php" type="button" class="btn btn-success">Login</a>
        <a href="user_registration.php" style="margin-left:30px;" type="button" class="btn btn-primary">Registration Now</a>
      </div>
     
    </div>
  </div>
</div>';
}    
    
?>
<style>
.panel-heading {
padding: 0;
}

.panel-group .panel {
border-color: transparent;
border: 0;
}

.panel-group .panel-heading a {
font-size: 14px;
}
</style>
<!-- Breadcrumbs -->
<?php if(isset($cat_id) or isset($sub_car_id)){?>
<div class="breadcrumbs">
<div class="container">
<div class="row">
<div class="col-xs-12">
    <ul>
        <li class="home"> <a title="Go to Home Page" href="shop.php">Go to shop page</a><span>&raquo;</span>
            <sapn>According to your search result</sapn>
        </li>
    </ul>
</div>
</div>
</div>
</div>
<?php } ?>
<!-- Breadcrumbs End -->
<!-- Main Container -->
<div class="main-container col2-left-layout">
<div class="container">
<div class="row">
<div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
<div id="msg"></div>
    <div class="shop-inner">
        <div class="toolbar">
            <div class="view-mode">
                <ul>
                    <li class="active"> <a href="shop_grid.html"> <i class="fa fa-th-large"></i> </a> </li>
                    <li> <a href="list_shop.php"> <i class="fa fa-th-list"></i> </a> </li>
                </ul>
            </div>
            <!---<div class="sorter">
                <div class="short-by">
                    <label>Sort By:</label>
                    <select onchange="shortBy(this.value)">
                        <option selected="selected">Position</option>
                        <option value="shop.php?latest=latest">Short By Latest</option>
                        <option value="shop.php?max_value=">Short By: Hight to Low</option>
                        <option value="shop.php?min_value=>">Short By: Low to Hight</option>
                    </select>
                </div>

            </div>--->
        </div>
        <div class="product-grid-area">
            <ul class="products-grid">

                <?php

if(mysqli_num_rows($allProd)>0){
while($allrow = mysqli_fetch_assoc($allProd)){

?>
                <li class="shop-product ">
                    <div class="product-item">
                        <div class="item-inner">
                            <div class="product-thumbnail">
                                <?php 
         if($allrow['Selling_Product'] != 'NO'){
            echo '<div class="icon-sale-label sale-left">'.$allrow['Selling_Product'].'</div>';
        }
        if($allrow['Reted_Product'] != 'NO'){
             echo '<div class="icon-new-label sale-right">'.$allrow['Reted_Product'].'</div>';
         }?>
                                <div class="pr-img-area"> <a title="Product title here" href="single_product.php?product_id=<?php echo $allrow['id']?>">
                                        <figure> <img class="first-img" src="admin/images/product/fetcher-product/<?php echo $allrow['fetcher_img'];?>">

                                            <img class="hover-img" src="admin/images/product/product-img/<?php echo $allrow['prod1'];?>" alt="HTML template">
                                        </figure>
                                    </a> </div>
                                <div class="pr-info-area">
                                    <div class="pr-button">
                                        <div class="mt-button quick-view"> <a href="quick_view_from_shop_page.php?product_id=<?php echo $allrow['id']?>"> <i class="fa fa-search"></i> </a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"> <a title="Product title here" href="single_product.php?product_id=<?php echo $allrow['id']?>"><?php echo $allrow['name'];?></a> </div>
                                    <div class="item-content">
                                        <!---<div class="rating"></div>--->
                                        <div class="item-price">
                                            <div class="price-box"> <span class="regular-price"> <span class="price">৳ <?php echo $allrow['sPrice'];?></span> </span> </div>
                                        </div>
                                       <form action="" method="post" class="form">
                                      <input type="hidden" class="pid" value="<?php echo $allrow['id']?>">
                                      <input type="hidden" class="pname" value="<?php echo $allrow['name']?>">
                                      <input type="hidden" class="pprice" value="<?php echo $allrow['sPrice']?>">
                                      <input type="hidden" class="pimg" value="<?php echo $allrow['fetcher_img']?>">
                                      <input type="hidden" class="ppinvoice" value="<?php echo $allrow['invoice']?>">
                                      <input type="hidden" class="user_id" value="<?php echo $useri_id;?>">

                                        <div class="pro-action">
                                           <?php 
                                            if($allrow['variarble'] == 'Variable product'){
                                            ?>
                                            <a href="single_product.php?product_id=<?php echo $allrow['id']?>"><button type="button" class="add-to-cart" ><span> Select Options</span> </button></a>
                                            <?php }else{ ?>
                                             <button <?php echo $addCartReqst;?> type="button" class="add-to-cart <?= $addCart;?>" id="<?php echo $addCart;?>"><span> Add to Cart</span> </button>
                                             <?php } ?>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>

                <?php } }else{
echo '   <div class="alert alert-danger">
<strong>No Product Fund</strong>
</div>';

} ?>

            </ul>
        </div>
        <div class="pagination-area">
            <ul>
               <?php 
                // display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
    $class = '';
    if($curent_page == $page){
        $class = "active";
    }
  echo '<li><a class="'.$class.'" href="shop.php?page='.$page.'">' . $page . '</a></li> ';
}
                ?>
               
                
            </ul>
        </div>
    </div>
</div>
<aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
    <div class="block shop-by-side">

        <div class="block-content">

    <div class="layered-Category">
         <div class="sidebar-bar-title">
            <h3>Categroy's</h3>
        </div>

        <ul id="sidebar-cat">
           
             <?php
                  $cat = mysqli_query($conn, "SELECT * FROM category");
                  if(mysqli_num_rows($cat) > 0){
                      while($catRow = mysqli_fetch_assoc($cat)){        
             ?>
               <li><a href="shop.php?cat_id=<?php echo $catRow['id'];?>"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;<?php echo $catRow['category'];?></a>
               
               
               
                 <?php 
                    $sub_cat = mysqli_query($conn, "SELECT * FROM sub_category WHERE category_id = '".$catRow['id']."'");
                  if(mysqli_num_rows($sub_cat) > 0){ ?>
                <ul>
                 <?php
                  while($sub_catRow = mysqli_fetch_assoc($sub_cat)){
                  ?>
                <li><a href="shop.php?sub_cat_id=<?php echo $sub_catRow['id'];?>"><i class="fa fa-angle-right"></i><span>&nbsp;&nbsp;<?php echo $sub_catRow['sub_category'];?></span></a></li>
                <?php } ?>
             
                </ul>
            <?php } ?>
                </li>
                <?php } } ?>
        </ul>



    </div>
        </div>

    </div>
    <div class="block product-price-range ">
        <div class="sidebar-bar-title">
            <h3>Price</h3>
        </div>
        <div class="block-content">
           <form method="post" action="">
            <div class="slider-range">
               
                <input type="hidden" id="amount1" name="min">
                <input type="hidden" id="amount2" name="max">
                
              <div id="slider-range" class="slider-range"></div>
               <p>Price Range: <span id="amount"></span></p>
               <button type="submit" name="submit_range" class="btn btn-primary">Filter</button>
              
            </div>
            </form>
        </div>
    </div>



</aside>
</div>
</div>
</div>
<!-- Main Container End -->
<?php include'inc/footer.php';?>


<script>
function toggleIcon(e) {
$(e.target)
.prev('.panel-heading')
.find(".more-less")
.toggleClass('glyphicon-chevron-right  glyphicon-chevron-down');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
    
 $(function(){
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1500,
      values: [ 50, 500 ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "৳" + ui.values[ 0 ] + " - ৳" + ui.values[ 1 ] );
		$( "#amount1" ).val(ui.values[ 0 ]);
		$( "#amount2" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).html( "৳" + $( "#slider-range" ).slider( "values", 0 ) +
     " - ৳" + $( "#slider-range" ).slider( "values", 1 ) );
  });
function shortBy(src){
    window.location=src;
}
</script>