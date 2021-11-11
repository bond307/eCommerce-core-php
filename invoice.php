<?php
session_start();
include('lib/db.php');
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
 
error_reporting(0);
//################################chekc order id###################################//
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
}


//################################order details######################################//
 $order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_order WHERE id = '$order_id'"));

$orderDtls = mysqli_query($conn, "SELECT * FROM tbl_order_details WHERE order_id = '$order_id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="assets/libs/css/invoice.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->
<style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice .thanks {
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}
.invoice table tr td{
}


.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}    
</style>
    <meta charset="UTF-8">
    <title>Product Invoice </title>
</head>
<body>
<div class="col-md-10 offset-md-1">
    
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
            <a href="account.php" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back to account</a>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="images/logo.png" data-holder-rendered="true" style="height:80px"/>
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <p><?= $order['user_name'];?></p>
                        </h2>
                        <div><?= $order['user_address']?></div>
                        <div><?= $order['user_number']?></div>
                        <div><?= $order['user_email']?></div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE #<?= $order['invoice']?></h1>
                        <div class="date">Order Date: <?= $order['order_date']?></div>
                        <div class="date">Invoice Date: <?php echo date('d-m-y h:m:s');?></div>
                    </div>
                </div>
                
                
                       <table class="table table-bordered tabel-striped">
                           <thead>
                               <th>#</th>
                               <th>Items</th>
                               <th>Qty</th>
                               <th>Price</th>
                           </thead>
                           <tbody>
                              <?php 
              $Price_total= '';
              $sub_total= '';
              if(mysqli_num_rows($orderDtls)){
                  while($Order_Product = mysqli_fetch_assoc($orderDtls)){ 
                      $Price_total = $Order_Product['product_qty']*$Order_Product['product_price'];
                      $sub_total += $Price_total; 
                    ?>
                
                        <tr>
                          <td>01</td>
                           <td>
                              <h5><?= $Order_Product['product_name']?></h5>
                           </td>
                           <td><?= $Order_Product['product_qty']?></td>
                           <td>৳ <?= $Price_total;?></td>
                       </tr>
                      
                        <?php } }?>

                       <tr>
                           <td style="font-size:20px;" colspan="3"><h5>Sub Total</h5></td>
                           <td style="font-size:20px;">৳<?= $sub_total?></td>
                       </tr>
                       <tr>
                          <td colspan="3">Shipping</td>
                          <?php if($order['ship'] == 'Out Dhaka'){ ?>
                           <td>৳ 100 <span> ঢাকার বাহিরে </span></td>
                           <?php }else{ ?>
                           <td>৳ 60 <span> ঢাকার ভিতরে  </span></td>
                           <?php } ?>
                       </tr>
                       <tr>
                           <td style="font-size:24px;" colspan="3"><h4>Total</h4></td>
                           <td style="font-size:24px;">৳ <?= $order['order_total_price']?> </td>
                       </tr>
                         
                           </tbody>
                       </table>
               
                
                 
              
            </main>
               <div class="thanks">Thank you!</div>
                
            <footer>
                <div class="col-md-6 offset-md-3">
                    <img src="images/my-signature.jpg" alt=""><br>
                    <p>ফাউন্ডার- kini24.com</p>
                </div>
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</div>
</body>
</html>
<script>
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });

</script>


<?php 
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>