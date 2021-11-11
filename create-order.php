<?php 
session_start();
include'lib/db.php';
if(isset($_SESSION['id'])){
     echo $user_id = $_SESSION['id'];
}



//// ##############################################################################//
//// ############################  UPLOAD PRODUCT IN ORDER TBL ####################//
//// ##############################################################################//

if(isset($_POST['order'])){
    $Oname           = mysqli_real_escape_string($conn, $_POST['oname']);
    $Ocompany        = mysqli_real_escape_string($conn, $_POST['ocname']);
    $Oemail          = mysqli_real_escape_string($conn, $_POST['oemail']);
    $Ocuntry         = mysqli_real_escape_string($conn, $_POST['ocuntry']);
    $Ostate          = mysqli_real_escape_string($conn, $_POST['ostate']);
    $Ocity           = mysqli_real_escape_string($conn, $_POST['ocity']);
    $Onumber         = mysqli_real_escape_string($conn, $_POST['onumber']);
    $Oaddress        = mysqli_real_escape_string($conn, $_POST['oaddress']);
    $Onote           = mysqli_real_escape_string($conn, $_POST['onote']);
    $total_price     = mysqli_real_escape_string($conn, $_POST['total_price']);
    $payment_option  = mysqli_real_escape_string($conn, $_POST['payment_option']);
   
    $ship     = mysqli_real_escape_string($conn, $_POST['ship']);
    $zip  = $_POST['zip'];
    $Oorder_status   = 'Pending';
    $Opayment_status = 'Pending';
    $Opayment_status = 'Pending';
    
    $date            = date('d-m-Y');
    $orderInvoice    = rand(0000, 9999);
    
    $bkash = mysqli_real_escape_string($conn, $_POST['bkash']);
    $bkashID = mysqli_real_escape_string($conn, $_POST['bkashID']);
    $nogod = mysqli_real_escape_string($conn, $_POST['nogod']);
    $nogodID = mysqli_real_escape_string($conn, $_POST['nogodID']);
    $roket = mysqli_real_escape_string($conn, $_POST['roket']);
    $roketID = mysqli_real_escape_string($conn, $_POST['roketID']);
    
    if($ship == 'Out Dhaka'){
       $intotal_price = $total_price+100;
    }else{
        $intotal_price = $total_price+60;
    }

    /// ######################################################################//
    /// #######################    Ship another page    ################//
    /// ######################################################################//
     $shiptoAnother         = mysqli_real_escape_string($conn, $_POST['shiptoAnother']);
     $anthrOname           = mysqli_real_escape_string($conn, $_POST['ONoname']);
     $anthrOcompany        = mysqli_real_escape_string($conn, $_POST['ONocname']);
     $anthrOemail          = mysqli_real_escape_string($conn, $_POST['ONoemail']);
     $anthrOcuntry         = mysqli_real_escape_string($conn, $_POST['ONocuntry']);
     $anthrOstate          = mysqli_real_escape_string($conn, $_POST['ONostate']);
     $anthrOcity           = mysqli_real_escape_string($conn, $_POST['ONocity']);
     $anthrzip         = mysqli_real_escape_string($conn, $_POST['ONzip']);
     $anthrOaddress        = mysqli_real_escape_string($conn, $_POST['ONoaddress']);

    $order = mysqli_query($conn, "INSERT INTO `tbl_order` (`id`, `user_id`, `user_name`, `user_compay_name`, `user_email`, `user_cutry`, `user_city`, `user_state`, `user_number`, `user_address`, `zip`, `user_shoping_note`, `order_total_price`, `paymet_status`, `payment_type`, `order_status`, `order_date`, `invoice`, `ship`) VALUES (NULL, '$user_id', '$Oname', '$Ocompany', '$Oemail', '$Ocuntry', '$Ocity', '$Ostate', '$Onumber', '$Oaddress', '$zip', '$Onote', '$intotal_price', 'Pending', '$payment_option', 'Pending', '$date', '$orderInvoice', '$ship' )");
    
    
    
    if($order == true){
          $order_id = mysqli_insert_id($conn); 
    /// ######################################################################//
    /// #######################    Another Page inser    ################//
    /// ######################################################################//
        if(isset($shiptoAnother) && !empty($shiptoAnother)){
            $shpAN = mysqli_query($conn, "INSERT INTO `tbl_ship_another` (`id`, `user_id`, `user_name`, `user_compay_name`, `user_cutry`, `user_city`, `user_state`, `user_number`, `user_address`, `zip`, `order_id`) VALUES (NULL, '$user_id', '$anthrOname', '$anthrOcompany', '$anthrOcuntry', '$an4', '$anthrOstate', '$anthrOnumber', '$anthrOaddress', '$anthrzip', '$order_id')");
        }
        
        
//// ################################ Show product category ####################////
        $addpayinfo = mysqli_query($conn, "INSERT INTO `tbl_pay_info` (`id`, `order_id`, `user_id`, `payment_type`, `bkash_number`, `bkash_tr_id`, `nogod_number`, `nogod_tr_id`, `roket_number`, `roket_tr_id`) VALUES (NULL, '$order_id', '$user_id', '$payment_option', '$bkash', '$bkashID', '$nogod', '$nogodID', '$roket', '$roketID');");
        

//// ################################ Show product category ####################////
$total_price='';
$showCart = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE userID = '$user_id'");
if(mysqli_num_rows($showCart)>0){
  while($showRows = mysqli_fetch_assoc($showCart)){
      $pName = $showRows['name'];
      $pcolor = $showRows['color'];
      $psize = $showRows['size'];
      $pid = $showRows['pid'];
      $product_img = $showRows['img'];
      $pprice = $showRows['price'];
      $pqty = $showRows['qyt'];
      $pinvoice = $showRows['invoice'];
      $puserID = $showRows['userID'];
      $ptotalPrice = $showRows['total'];
      
             
   $order_details = mysqli_query($conn, "INSERT INTO `tbl_order_details` (`id`, `order_id`, `user_id`, `product_id`, `product_name`, `product_price`, `product_img`, `product_qty`, `product_size`, `product_color`) VALUES (NULL, '$order_id', '$user_id', '$pid', '$pName', '$pprice', '$product_img', '$pqty', '$psize', '$pcolor')");
      
      if($order_details == true){
          
          $deleteCartProduct = mysqli_query($conn, "DELETE FROM tbl_cart WHERE userID = '$puserID'");
          if($deleteCartProduct == true){
             header("Location: thank-you.php?order_id=$order_id");
              
/*$to = 'freelancer4747@gmail.com';
$subject = "Order Information Successfully Recived By Dhaka Curiar City.";
$headers = "From: Nogor Curiar <support@kini24.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=IOS-8859-1\r\n";

$msg = '<!DOCTYPE html>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
  
    .rtl {
        direction: rtl;
        font-family: sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="images/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: '.$orderInvoice.'<br>
                                Created: '.$date.'<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                '$Ocompany'<br>
                                '.$Ocity.'<br>
                                '.$Oaddress.'
                            </td>
                            
                            <td>
                                '.$Oname.'<br>
                                '$Oemail'
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    ৳
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    '.$payment_option.'
                </td>
                
                <td>
                    '.$intotal_price.'
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    '.$pName.'
                </td>
                
                <td>
                    '.$pprice.'
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Hosting (3 months)
                </td>
                
                <td>
                    $75.00
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Domain name (1 year)
                </td>
                
                <td>
                    $10.00
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: $385.00
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
';

if(mail($to,$subject,$msg,$headers)){
    echo '<div id="myModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"> সফলতার আপনার ওর্ডারটি তৈরি হয়েছে </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
        </div>
          <div class="modal-body">
          <h4 class="font-weight-bold">আপনার শিপিং খরচ = <span class="text-danger">'.$shipingCost.' টাকা। </span></h4>
           <p>ওয়র্ডার ইনফরমেশন আপনার ইমেইলে পাঠানো হয়েছে। আপনার ইমেলের স্পাম বক্স চেক করুন। </p>
           <p class="text-success font-weight-bold">ধ্যন্যবাদ</p>
         </div>
     </div>
  </div> 
</div>
                ';*/
}

              
              
          }
      }
     
  }
}
        
 
        
        
        
    }else{
        
    }
  
} 





      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
?>
