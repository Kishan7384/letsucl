<?php
include('header.php');
if (isset($_POST['sam']) && $_POST['sam'] == "sameer") {

}

if (isset($_POST['sam']) && $_POST['sam'] == "sameer") {
  
   
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

                    <!-- Page Heading -->
                    <section class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-default">
                        Add Customer <br>
                                            </div>
                    <div class="card-body">
                    <form action="" name="aadhar" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="sam" value="sameer">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-md-4">
                                        <label for="username">Username</label>
                                        <input type="text" placeholder="Full Name" id="username" name="username" class="form-control" value="<?php echo $_SESSION['phone'] ?>" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name">Full Name</label>
                                        <input type="text" placeholder="Full Name" id="name" name="name" class="form-control" required="">
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="fname">Father Name</label>
                                        <input type="text" placeholder="Father Name" id="fname" name="fname" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" placeholder="dob" id="dob" name="dob" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="aadharno">Aadhaar No.</label>
                                        <input id="aadharno" name="aadharno" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="poi">POI</label>
                                        <input type="text" id="poi" name="poi" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="poa">POA</label>
                                        <input type="text" id="poa" name="poa" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pob">POB</label>
                                        <input type="text" id="pob" name="pob" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="mobileno">Mobile No.</label>
                                        <input id="mobileno" name="mobileno" type="text" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email">Email ID</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="purpose">Purpose</label>
                                        <input type="text" id="purpose" name="purpose" class="form-control">
                                    </div>
                                </div>
                            </div>
                               <!-- /.finger-file -->
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="myButton" class="btn btn-success btn-icon"><i class="fa fa-floppy-o"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
<footer class="footer">
                <span>Copyright © 2022&nbsp; Aadharupdateucl . All rights reserved.</span>
            </footer>      </section>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
        </div>
        <!-- End of Content Wrapper -->

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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

</body>

</html>