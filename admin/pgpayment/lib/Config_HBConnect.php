<?php
error_reporting(0);
include('../../config.php');
$upiuid = 'paytmqr281005050101tzeso9n7syfs@paytm';
$secret='zJ8WdwP14f';
$token = '3beb54-56115d-6cb487-c17d48-7dc7a3';
$orderId = time();
// $orderId = $_POST['order_id'];
$txnAmount = $_POST['amount'];
$txnNote =   $_POST['emailid'];
$cust_Mobile = $_POST['phone'];
$cust_Email = $_POST['emailid'];
$callback_url = 'https://service4public.in/ucl/admin/pgpayment/pgResponse.php';
$RECHPAY_ENVIRONMENT = 'PROD'; 
$RECHPAY_TXN_URL='https://myupifast.in/order/process';
$RECHPAY_STATUS_URL='https://myupifast.in/order/status';
if($RECHPAY_ENVIRONMENT == 'PROD') {
$RECHPAY_TXN_URL='https://myupifast.in/order/process';
$RECHPAY_STATUS_URL='https://myupifast.in/order/status';
}
?>