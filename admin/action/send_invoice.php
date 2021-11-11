<?php 
include '../lib/db.php';
session_start();
if(isset($_POST['send'])){
    
    if(isset($_POST['user_email'])){
        $user_emial = $_POST['user_email'];
    } 
    
    if(isset($_POST['user_name'])){
        $user_name = $_POST['user_name'];
    }
    
    if(isset($_POST['invoice'])){
        $invoice = $_POST['invoice'];
    }
    
    if(isset($_POST['order_id'])){
        $order_id = $_POST['order_id'];
        
    }
    if(isset($_POST['msg_body'])){
       $msg_body = $_POST['msg_body'];
    }

$to = 'freelancer4747@gmail.com';
$subject = "Order Information Successfully Recived By Dhaka Curiar City.";
$headers = "From: Nogor Curiar <support@kini24.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=IOS-8859-1\r\n";

 $msg = '<!DOCTYPE html">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Thank you for Registering</title>
    <style type="text/css">

      #outlook a {
        padding: 0;
      }
      body {
        width: 100% !important;
        background-color: #f4f7fa;
        -webkit-text-size-adjust: none;
        -ms-text-size-adjust: none;
        margin: 0 !important;
        padding: 0 !important;
      }
      .ReadMsgBody {
        width: 100%;
      }
      .ExternalClass {
        width: 100%;
      }
      ol li {
        margin-bottom: 15px;
      }

      img {
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
      }
      #backgroundTable {
        height: 100% !important;
        margin: 0;
        padding: 0;
        width: 100% !important;
      }

      p {
        margin: 1em 0;
      }

      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        color: #222222 !important;
        font-family: Arial, Helvetica, sans-serif;
        line-height: 100% !important;
      }

      table td {
        border-collapse: collapse;
      }

      .yshortcuts,
      .yshortcuts a,
      .yshortcuts a:link,
      .yshortcuts a:visited,
      .yshortcuts a:hover,
      .yshortcuts a span {
        color: black;
        text-decoration: none !important;
        border-bottom: none !important;
        background: none !important;
      }

      .im {
        color: black;
      }
      div[id="tablewrap"] {
        width: 100%;
        max-width: 600px !important;
      }
      table[class="fulltable"],
      td[class="fulltd"] {
        max-width: 100% !important;
        width: 100% !important;
        height: auto !important;
      }

      @media screen and (max-device-width: 430px),
        screen and (max-width: 430px) {
        td[class="emailcolsplit"] {
          width: 100% !important;
          float: left !important;
          padding-left: 0 !important;
          max-width: 430px !important;
        }
        td[class="emailcolsplit"] img {
          margin-bottom: 20px !important;
        }
      }
        .flot-left {
	text-align: left;
	font-size: 24px;
	color: #333;
	font-weight: bold;
}
        .flot-right {
	text-align: right;
	font-size: 20px;
}
    </style>
  </head>
  <body><br><br>
    <table style=" width: 100%;">
     
      <tr>
        <td />
        <td valign="top" style=" width: 40%; min-width: 580px; text-align: center">
          <a
            href="kini24.com"
            style="display:inline-block; text-align:center;"
          >
            <img
              src="../images/logo.png"
              width="170"
            />
          </a>
        </td>
        <td />
      </tr>

      <tr>
        <td />
        <td style=" text-align: center;">
          <table
            style="border-collapse: separate; border-radius: 4px; background-color: rgb(255, 255, 255);"
            width="100%"
            cellspacing="0"
            cellpadding="0"
          >
            <tr>
              <td height="20"></td>
            </tr>
            <tr
              style="color: rgb(78, 92, 110); font-size: 14px; line-height: 20px; margin-top: 20px;"
            >
              <td
                colspan="2"
                style="padding-left:90px; padding-right:90px; text-align:center"
                valign="top"
              >
              
                
                <table>
    <tr class="flot-left">
         <td>Name: '.$user_name.' </td>
     </tr>
      <tr class="flot-right">
         <td>Invoice: #'.$invoice.' </td>
     </tr><br>
  <br><tr>
    <td>
     '.$msg_body.'
    </td>
  </tr>
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td
      style="text-align:center;"
      width="100%"
      bgcolor="#ffffff"
    >
      <a 
        style="font-weight:bold; text-decoration:none;"
        href="kini24.com/login.php"
      >
        <span
          style="display:block; max-width:100% !important; width:93% !important; height:auto !important;background-color:#d3461e;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px;border-radius:8px;color:#ffffff;font-size:24px;font-family:Arial, Helvetica, sans-serif;"
        >
          Visit Your Account
        </span>
      </a>
    </td>
  </tr>
  <tr>
    <td height="20"></td>
  </tr>
 
  <tr>
    <td height="20"></td>
  </tr>
 
  <tr>
    <td height="20"></td>
  </tr>

</table>

                <!-- BODY END -->
              </td>
            </tr>
           
          </table>
        </td>
        <td />
      </tr>

      <tr>
        <td />
        <td style=" text-align: center; color:#9EB0C9!important;">
          <a
            href="https://www.kini24.com"
            target="_blank"
            style="text-decoration:none;"
            >&copy; Kini24</a
          >
        </td>
        <td />
      </tr>
    </table>
  </body>
</html>
';
    
    
  if(mail($to, $subject, $msg, $headers)){
      header("Location: single-order.php?view_order='$order_id'");
        $_SESSION['msg'] = '<div class="alert alert-primary" role="alert">
  Email is Send
</div>';
  }
    
}

?>
