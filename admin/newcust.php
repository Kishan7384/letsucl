
<?php 
include('header.php');
include('../includes/config.php');
if (isset($_POST['txn_form']) && $_POST['txn_form'] == "ahkwebsolutions"  ){
  
  
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $aadharno = mysqli_real_escape_string($conn,$_POST['aadharno']);
    $poi = mysqli_real_escape_string($conn,$_POST['poi']);
    $poa = mysqli_real_escape_string($conn,$_POST['poa']);
    $pob = mysqli_real_escape_string($conn,$_POST['pob']);
    $mobileno = mysqli_real_escape_string($conn,$_POST['mobileno']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $purpose = mysqli_real_escape_string($conn,$_POST['purpose']);
    
    


    date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
    $dateof_issue = date('d-m-y h:i:s');
    $dateof_update = date('d-m-y h:i:s');
    $username = $_SESSION['phone'];
    // Birth fee 
    
    date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
    $dateof_issue = date('d-m-y h:i:s');
    $dateof_update = date('d-m-y h:i:s');
    $username = $_SESSION['phone'];
    $fee = $ahkweb['pdffee'];
    $debit_fee = $panwallet_amount - $fee;
    if($panwallet_amount > $fee){
        $ires = mysqli_query($conn,"INSERT INTO `aadhar`(`username`,`name`,`fname`,`dob`,`aadharno`,`poi`,`poa`,`pob`,`mobileno`,`email,`purpose`,`remark`,`status`) VALUES ('$username','$name','$fname','$dob','$aadharno','$poi','$poa','$pob','$mobileno','$email','$purpose','','pending')");
        $debit = mysqli_query($conn,"UPDATE `usertable` SET panwallet='$debit_fee' WHERE phone='$username'");
    
    if($ires){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Success',
                    'Details Submitted Successfully!',
                    'success'
                )
            });
             window.setTimeout(function() {
  window.location.href = "addcustomer.php";
  }, 1500);
        </script>
        <?php 
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Internal Server Error!',
                    'error'
                )
            });
        </script>
        <?php
    }

    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Wallet Balance Insufficient ! Please Recharge ',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='wallet.php';
            },1500);
            
        </script>
      <?php

  }
  
}
?>

    <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="row page-header">
        <div class="col-lg-6 align-self-center ">
            <h2>Add Customer</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Customer</li>
            </ol>
        </div>
        <div class="col-lg-6 align-self-center text-right">
            <a href="customerlist.php" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-users"></i> View Customers</a>
        </div>
    </div>
            
                <section class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-default">
                        Add Customer <br>
                                            </div>
                    <div class="card-body">
                        <form  method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="FullName">Full Name</label>
                                        <input type="hidden" name="txn_form" value="ahkwebsolutions">
                                        <input type="text" placeholder="Full Name" id="fullname" name="name" class="form-control" required="">
                                    </div>
                                    <input type="hidden" name="sub" value="1">
                                    <div class="col-md-4">
                                        <label for="fathername">Father Name</label>
                                        <input type="text" placeholder="Father Name" id="fathername" name="fname" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date-input1">Date of Birth</label>
                                        <div class="form-group">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                <input type="text" name="birthdate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Aadhaar">Aadhaar No.</label>
                                        <input id="aadhaar-no" name="aadhaar_no" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="poi">POI</label>
                                        <input type="file" id="poi" name="poi" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="poa">POA</label>
                                        <input type="file" id="poa" name="poa" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pob">POB</label>
                                        <input type="file" id="pob" name="pob" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="MobileNo">Mobile No.</label>
                                        <input id="mobileno" name="mobile_no" type="text" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Email">Email ID</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Purpose">Purpose</label>
                                        <input type="text" id="purpose" name="purpose" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                            <div style="width:100px; height : auto" class="text-center mt-2">
                                            
                                            <img id="imgFinger" width="145px" height="188px" style="width:205px;"  Falt="Finger Image" class="padd_top" />
                                                <input class="form-control" type="hidden" id="pic5" name="photo5">
                                
                                                </div>
                                           
                                                <button type="submit" id="btnCapture" value="Capture" class=" capturebuttonpadding btn btn-outline-info px-4 mt-1 capture btn-sm w-100" onclick="return Capture()"> Click </button>
                                                <h5 id="q1" class="text-center mt-3"></h5>
                                                <input type="text"  class="text-center btn btn-danger px-4 mt-1 capture btn-sm w-100" disabled="disabled" value="%" id="txtImageInfo"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="img/sd.jpg" id="im2" class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic2" name="photo2">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="img/check.png" style="display:none; width:205px;" id="cim2" alt="">
                                                </div>
                                                <button type="submit" id="btnCapture" value="Capture" class=" capturebuttonpadding btn btn-outline-info px-4 mt-1 capture btn-sm w-100" onclick="return Capture()"> Click </button>
                                                <h5 id="q2" class="text-center mt-3"></h5>
                                                <input type="text"  class="text-justify-center btn btn-danger box-shadow btn-icon btn-rounded px-4 mt-1 capture btn-sm w-100" disabled="disabled" value="%" id="txtImageInfo"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="img/sd.jpg" id="im3" class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic3" name="photo3">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="img/check.png" style="display:none; width:205px;" id="cim3" alt="">
                                                </div>
                                                <button type="submit" id="btnCapture" value="Capture" class=" capturebuttonpadding btn btn-outline-info px-4 mt-1 capture btn-sm w-100" onclick="return Capture()"> Click </button>
                                                <h5 id="q3" class="text-center mt-3"></h5>
                                                <input type="text"  class="text-justify-center btn btn-danger box-shadow btn-icon btn-rounded px-4 mt-1 capture btn-sm w-100" disabled="disabled" value="%" id="txtImageInfo"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                            <img src="img/sd.jpg" id="im3" class="img-fluid rounded-end border p-1">
                                                <input class="form-control" type="hidden" id="pic3" name="photo3">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="img/check.png" style="display:none; width:205px;" id="cim3" alt="">
                                                </div>
                                                <button type="submit" id="btnCapture" value="Capture" class=" capturebuttonpadding btn btn-outline-info px-4 mt-1 capture btn-sm w-100" onclick="return Capture()"> Click </button>
                                                <h5 id="q4" class="text-center mt-3"></h5>
                                                <input type="text"  class="text-justify-center btn btn-danger box-shadow btn-icon btn-rounded px-4 mt-1 capture btn-sm w-100" disabled="disabled" value="%" id="txtImageInfo"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                            <div style="width:100px; height : auto" class="text-center mt-2">
                                            <img id="imgFinger" width="145px" height="188px" style="width:205px;"  Falt="Finger Image" class="padd_top" />
                                                <input class="form-control" type="hidden" id="pic5" name="photo5">
                                
                                                </div>
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:300px;" id="cim5" alt="">
                                                </div>
                                                <button type="bsubmit" id="btnCapture" value="Capture" class=" capturebuttonpadding btn btn-outline-info px-4 mt-1 capture btn-sm w-100" onclick="return Capture()"> Click </button>
                                                <h5 id="q5" id="txtImageInfo" class="text-center mt-3"></h5>
                                                <input type="text"  class="text-justify-center btn btn-danger box-shadow btn-icon btn-rounded px-4 mt-1 capture btn-sm w-100" disabled="disabled" value="%" id="txtImageInfo"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success btn-icon"><i class="fa fa-floppy-o"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="register_panel">
        <div class="panel panel-primary">
        <div class="panel-heading font"> </div>
        <div class="panel-body margin">
        
        <form method = "post" action="#" name="myform">
            
            <table width="100%" style="padding-top:0px;">
          <tr>
              <td width="200px;">
                  <table align="left" border="0" width="100%">
                     
    
                  </table>
              </td>
             
      
             
          </tr>
      </table>
<div class="hidden">
<table width="100%">
<tr class="hidden">
  <td class="hidden">
  
  </td>
</tr>


<tr class="hidden">
  
<input type="text"disabled="disabled" id="txtIsoTemplate" name="txtIsoTemplate" style="width: 100%; height:50px;" value="" class="form-control"/>

      <input type="hidden" disabled="disabled" id="txtAnsiTemplate" style="width: 100%; height:50px;" class="form-control"/>

      <input type="hidden" disabled="disabled" id="txtIsoImage" style="width: 100%; height:50px;" class="form-control"/>

      <input type="hidden" disabled="disabled" id="txtRawData" style="width: 100%; height:50px;" class="form-control"/>

      <input type="hidden" disabled="disabled" id="txtWsqData" style="width: 100%; height:50px;" class="form-control"/>

      <input type="hidden" disabled="disabled" id="txtStatus"  style="width: 100%; height:50px;" class="form-control" />
     

   

</table> 
     
 </form>

    
    
    </div>
       </div>
    </div>
<footer class="footer">
                <span>Copyright © 2022&nbsp; Aadharupdateucl . All rights reserved.</span>
            </footer>      </section>
       

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<!-- finger 5-->

    <?php 
if(!isset($_SESSION['bsubmit']))
{
  $_SESSION['exampleInputEmail1'] = '';
  $_SESSION['exampleInputPassword1'] = '';
  $_SESSION['exampleInputPassword2'] = '';
  $_SESSION['securityquestion1'] = '';
  $_SESSION['securityanswer1'] = '';
  $_SESSION['securityquestion2'] = '';
  $_SESSION['securityanswer2'] = '';
  $_SESSION['securityquestion3'] = '';
  $_SESSION['securityanswer3'] = '';
  $_SESSION['securityquestion4'] = '';
  $_SESSION['securityanswer4'] = '';
  $_SESSION['txtIsoTemplate'] = '';
}

define('ENCRYPTION_KEY', 'd0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');
$key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
// Encrypt Function
function encrypt($encrypt, $key)
{
    $encrypt = serialize($encrypt);
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    //$key = pack('H*', $key);
    $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
    $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
    $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
    return $encoded;
}


if(isset($_POST['bsubmit']))
{
  $exampleInputEmail1 = mysqli_real_escape_string($conn , $_POST['exampleInputEmail1']);
  $exampleInputPassword1 = mysqli_real_escape_string($conn, $_POST['exampleInputPassword1']);
  $exampleInputPassword2 = mysqli_real_escape_string($conn, $_POST['exampleInputPassword2']);
    $txtIsoTemplate = mysqli_real_escape_string($conn, $_POST['txtIsoTemplate']);

 $query = "SELECT * FROM register WHERE email_id='$exampleInputEmail1'";
 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
 $count = mysqli_num_rows($result);
  if($count < 1)
  {
if ($exampleInputPassword1 == $exampleInputPassword2) 
{

  
  $exampleInputPassword1 = md5($_POST['exampleInputPassword1']);
  $confirm_password = md5($_POST['exampleInputPassword2']);
  $activation = 1;
  $ip=$_SERVER['REMOTE_ADDR'];
  $my_date = date("Y-m-d H:i:s");

$sql = "insert into register(email_id, password , confirm_password ,activation , ip , date , fingerprint) values('$exampleInputEmail1', '$exampleInputPassword1' ,'$confirm_password', '$activation' , '$ip' , '$my_date' , '$txtIsoTemplate');";
mysqli_query($conn, $sql);

$sql1 = "insert into login(email_id, password, activation) values ('$exampleInputEmail1', '$exampleInputPassword1', '$activation');";
mysqli_query($conn, $sql1);
echo "<script type='text/javascript'>alert('Succesfully Registered..!!')</script>";
}
else
{
  echo "<script type='text/javascript'>alert('password not matched..!!')</script>"; 
}
}
else
echo "<script type='text/javascript'>alert('Email_id Already exist..!!')</script>";
}
?>




    <script language="javascript" type="text/javascript">

        var flag =0;
        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )

//function to initialize the device

        function GetInfo() {
            document.getElementById('tdSerial').innerHTML = "";
            document.getElementById('tdCertification').innerHTML = "";
            document.getElementById('tdMake').innerHTML = "";
            document.getElementById('tdModel').innerHTML = "";
            document.getElementById('tdWidth').innerHTML = "";
            document.getElementById('tdHeight').innerHTML = "";
            document.getElementById('tdLocalMac').innerHTML = "";
            document.getElementById('tdLocalIP').innerHTML = "";
            document.getElementById('tdSystemID').innerHTML = "";
            document.getElementById('tdPublicIP').innerHTML = "";


            var key = document.getElementById('txtKey').value;

            var res;
            if (key.length == 0) {
                res = GetMFS100Info();
            }
            else {
                res = GetMFS100KeyInfo(key);
            }

            if (res.httpStaus) {

                document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                if (res.data.ErrorCode == "0") {
                    document.getElementById('tdSerial').innerHTML = res.data.DeviceInfo.SerialNo;
                    document.getElementById('tdCertification').innerHTML = res.data.DeviceInfo.Certificate;
                    document.getElementById('tdMake').innerHTML = res.data.DeviceInfo.Make;
                    document.getElementById('tdModel').innerHTML = res.data.DeviceInfo.Model;
                    document.getElementById('tdWidth').innerHTML = res.data.DeviceInfo.Width;
                    document.getElementById('tdHeight').innerHTML = res.data.DeviceInfo.Height;
                    document.getElementById('tdLocalMac').innerHTML = res.data.DeviceInfo.LocalMac;
                    document.getElementById('tdLocalIP').innerHTML = res.data.DeviceInfo.LocalIP;
                    document.getElementById('tdSystemID').innerHTML = res.data.DeviceInfo.SystemID;
                    document.getElementById('tdPublicIP').innerHTML = res.data.DeviceInfo.PublicIP;
                }
            }
            else {
                alert(res.err);
            }
            return false;
        }
//function to capture the finger prints. 

        function Capture() {
            try {
                document.getElementById('txtStatus').value = "";
                document.getElementById('imgFinger').src = "data:image/bmp;base64,";
                document.getElementById('txtImageInfo').value = "";
                document.getElementById('txtIsoTemplate').value = "";
                document.getElementById('txtAnsiTemplate').value = "";
                document.getElementById('txtIsoImage').value = "";
                document.getElementById('txtRawData').value = "";
                document.getElementById('txtWsqData').value = "";

                var res = CaptureFinger(quality, timeout);
                if (res.httpStaus) {
                      flag = 1;
                    document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                    if (res.data.ErrorCode == "0") {
                        document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                        var imageinfo = "Quality: " + res.data.Quality + "% " ;
                        document.getElementById('txtImageInfo').value = imageinfo ;
                        document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;
                        document.getElementById('txtAnsiTemplate').value = res.data.AnsiTemplate;
                        document.getElementById('txtIsoImage').value = res.data.IsoImage;
                        document.getElementById('txtRawData').value = res.data.RawData;
                        document.getElementById('txtWsqData').value = res.data.WsqImage;
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;
        }

        function Verify() {
            try {
                var isotemplate = document.getElementById('txtIsoTemplate').value;
                var res = VerifyFinger(isotemplate, isotemplate);

                if (res.httpStaus) {
                    if (res.data.Status) {
                        alert("Finger matched");
                    }
                    else {
                        if (res.data.ErrorCode != "0") {
                            alert(res.data.ErrorDescription);
                        }
                        else {
                            alert("Finger not matched");
                        }
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;

        }

        function Match() {
            try {
                var isotemplate = document.getElementById('txtIsoTemplate').value;
                var res = MatchFinger(quality, timeout, isotemplate);

                if (res.httpStaus) {
                    if (res.data.Status) {
                        alert("Finger matched");
                    }
                    else {
                        if (res.data.ErrorCode != "0") {
                            alert(res.data.ErrorDescription);
                        }
                        else {
                            alert("Finger not matched");
                        }
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;

        }

        function GetPid() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array(); // You can add here multiple FMR value
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "UNKNOWN", "", "");

                var res = GetPidData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.PidData.Pid
                        document.getElementById('txtSessionKey').value = res.data.PidData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.PidData.Hmac
                        document.getElementById('txtCi').value = res.data.PidData.Ci
                        document.getElementById('txtPidTs').value = res.data.PidData.PidTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }
        function GetProtoPid() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array(); // You can add here multiple FMR value
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "UNKNOWN", "", "");

                var res = GetProtoPidData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.PidData.Pid
                        document.getElementById('txtSessionKey').value = res.data.PidData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.PidData.Hmac
                        document.getElementById('txtCi').value = res.data.PidData.Ci
                        document.getElementById('txtPidTs').value = res.data.PidData.PidTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }
        function GetRbd() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array();
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "LEFT_INDEX", 2, 1);
                Biometrics["1"] = new Biometric("FMR", isoTemplateFMR, "LEFT_MIDDLE", 2, 1);
                // Here you can pass upto 10 different-different biometric object.


                var res = GetRbdData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.RbdData.Rbd
                        document.getElementById('txtSessionKey').value = res.data.RbdData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.RbdData.Hmac
                        document.getElementById('txtCi').value = res.data.RbdData.Ci
                        document.getElementById('txtPidTs').value = res.data.RbdData.RbdTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }

        function GetProtoRbd() {
            try {
                var isoTemplateFMR = document.getElementById('txtIsoTemplate').value;
                var isoImageFIR = document.getElementById('txtIsoImage').value;

                var Biometrics = Array();
                Biometrics["0"] = new Biometric("FMR", isoTemplateFMR, "LEFT_INDEX", 2, 1);
                Biometrics["1"] = new Biometric("FMR", isoTemplateFMR, "LEFT_MIDDLE", 2, 1);
                // Here you can pass upto 10 different-different biometric object.


                var res = GetProtoRbdData(Biometrics);
                if (res.httpStaus) {
                    if (res.data.ErrorCode != "0") {
                        alert(res.data.ErrorDescription);
                    }
                    else {
                        document.getElementById('txtPid').value = res.data.RbdData.Rbd
                        document.getElementById('txtSessionKey').value = res.data.RbdData.Sessionkey
                        document.getElementById('txtHmac').value = res.data.RbdData.Hmac
                        document.getElementById('txtCi').value = res.data.RbdData.Ci
                        document.getElementById('txtPidTs').value = res.data.RbdData.RbdTs
                    }
                }
                else {
                    alert(res.err);
                }

            }
            catch (e) {
                alert(e);
            }
            return false;
        }
       
        function validateform()
        {

        var password1=document.myform.exampleInputPassword1;
        var email=document.myform.exampleInputEmail1.value;
        
        if(email.length>20)
        {
            alert("username can be max 25 char");
            return false;
        }

        if (password1.length>8) 
        {
          alert("password should be max 8 char");
          return false;
        }

        // password matching
        if (password1==password2) 
        {
          return true;
        }
        else
         {
            alert("password not matched");
            return false;
         } 

        }

    </script>
    <!-- finger 5 end-->
    
    <script src="jquery-1.8.2.js"></script>
<script src="mfs100-9.0.2.6.js"></script>
</body>

</html>