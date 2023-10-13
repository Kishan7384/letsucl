<?php
error_reporting(0);
include '../config.php'; 
require_once('lib/Config_HBConnect.php');
require_once('lib/RechPayChecksum.php');
$array = array();
$status = $_POST['status']; 
$txnAmount = $_POST['txnAmount'];
$message = $_POST['message']; 
$hash = $_POST['hash']; 
$checksum = $_POST['checksum'];
if($status=="SUCCESS"){
$paramList = hash_decrypt($hash,$secret);
$verifySignature = RechPayChecksum::verifySignature($paramList, $secret, $checksum);
if($verifySignature){
$array = json_decode($paramList,true);
$userid = $array["sender_note"];
$amt=$array["txnAmount"];
$sql = "UPDATE usertable SET  walletamount= walletamount +'$amt' WHERE emailid='$userid'";
$qry =  mysqli_query($conn,$sql);
// $tsql = "INSERT INTO `pantxn`(`emailid`, `amount`, `txnid`, `upi`, `status`) VALUES ('$userid','$amt','automatic','Online','success')";
// $tqry =  mysqli_query($conn,$tsql);
echo '<h1 style="color:blue;text-align:center;">Payment Successfull, Wallet Updated</h1>';

        ?>
   <script>
            setTimeout(()=>{
                window.location.href="https://service4public.in/ucl/admin/;
            },2000);
        </script>
        <?php 
    
    
    }
}
else {  echo "Payment Failed";
?>

      <script>
            setTimeout(()=>{
                window.location.href="https://service4public.in/ucl/admin/";
            },2000);
        </script>
<?php }




?>