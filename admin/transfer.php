<?php include "header.php";
if($_SESSION['userid'] != "ADMIN"){
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
    die;

}

include('header.php');?>
 
<?php 
if(isset($_GET['apid']) && $_GET['approve'] == 1 ){
     $apid = base64_decode(mysqli_real_escape_string($conn,$_GET['apid']));
    $select = mysqli_query($conn,"SELECT * FROM qrtxn WHERE txnid='$apid' AND status='pending'");
    if(mysqli_num_rows($select)==1){
    $data = mysqli_fetch_assoc($select);
    $amt = $data['amount'];
    $pupdate =  mysqli_query($conn,"UPDATE payments SET status='success' WHERE order_id='$apid' ");
    $update = mysqli_query($conn,"UPDATE users SET balance=balance+$amt WHERE username='".$data['username']."'");
    if($update && $pupdate){
        ?>
         <script>
            $(function(){
                Swal.fire(
                    'Balance Added Successfully', 
                    '',
                    'success'
                )
            })
            setTimeout(() => {
                window.location='BalanceTransfer.php';
            }, 1000);
            </script>
        <?php
    }else{
        ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Not Added', 
                            '',
                            'error'
                        )
                    })
                  
                </script>
                <?php
    }
    }
}else if(isset($_GET['rejid']) && $_GET['reject'] == 1 ){
    $apid = base64_decode(mysqli_real_escape_string($conn,$_GET['rejid']));
   $select = mysqli_query($conn,"SELECT * FROM payments WHERE order_id='$apid' ");
   if(mysqli_num_rows($select)==1){
   $data = mysqli_fetch_assoc($select);
   $update = mysqli_query($conn,"UPDATE payments SET status='rejected' WHERE order_id='$apid'");
   if($update){
       ?>
        <script>
           $(function(){
               Swal.fire(
                   'Reject Successfully', 
                   '',
                   'success'
               )
           })
           setTimeout(() => {
               window.location='BalanceTransfer.php';
           }, 1000);
           </script>
       <?php
   }else{
       ?>
               <script>
                   $(function(){
                       Swal.fire(
                           'Something Wrong', 
                           '',
                           'error'
                       )
                   })
                 
               </script>
               <?php
   }
   }
}
if(isset($_POST['ahkweb_add_user']) && $_POST['ahkweb_add_user'] =="ahkwebsolutions_adduser"){
        $email = mysqli_real_escape_string($conn,$_POST['emailid']);
        $amount = mysqli_real_escape_string($conn,$_POST['amount']);
      
      $res = mysqli_query($conn,"UPDATE usertable SET walletamount=walletamount+'$amount' WHERE emailid='$email' ");
      
      if($res){
      ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Balance Added Successfully', 
                            '',
                            'success'
                        )
                    })
                  
                </script>
                <?php
      }else{
      ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Opps',
                            'Balance Not Added',
                            'error'
                        )
                    })
                </script>
                <?php
        
      }
        
    }
if(isset($_POST['mobile']) && $_POST['transfer'] == 'true'){
    $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
    $sl = mysqli_query($conn,"SELECT * FROM usertable WHERE  phone='$mobile'");
    if(mysqli_num_rows($sl)==1){
        $ud = mysqli_fetch_assoc($sl);
        ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="row page-header">
        <div class="col-lg-6 align-self-center ">
            <h2>Balance Transfer</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Balance Transfer</li>
            </ol>
        </div>
        <div class="col-lg-6 align-self-center text-right">
            <a href="view-users.php" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-users"></i>
                View Customers</a>
        </div>
    </div>
    <section class="main-content">
    <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Conform User Details</h4>
                          </div>
                          <div class="card-body">
                              <form action="" method="POST">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>Full name of User:</label>
                                                      <input type="text" class="form-control" value="<?php echo $ud['name']; ?>" readonly>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>Old Wallet balance:</label>
                                                      <input type="text" class="form-control" value="<?php echo $ud['walletamount']; ?>" readonly >
                                                  </div>
                                              </div>
                                              <input type="hidden" name="ahkweb_add_user" value="ahkwebsolutions_adduser">
                                              <input type="hidden" name="emailid" value="<?php echo $ud['emailid']; ?>">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>Add Wallet Amount:</label>
                                                      <input required name="amount" value="" type="number" placeholder="Enter Amount" class="form-control">
                                                  </div>
                                              </div>
                                          </div>
                                          
                                          <div class="text-end">
                                              <button type="submit" class="btn btn-primary">Transfer</button>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
  <?php
    }else{
        ?>
        <div class="row">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4 class="card-title">Balance Transfer ENTER USER MOBILE NO ONLY</h4>
                              </div>
                              <div class="card-body">
                                  <form action="" method="POST">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="row">
                                                  <div class="col-md-6">
                                                    <p class="text-danger">No Data Found try Again by User Mobile No!!</p>
                                                      <div class="form-group">
                                                          <label>ENTER USER MOBILE NO ONLY</label>
                                                          <input type="number" class="form-control" maxlength="10" name="mobile"  placeholder="Enter beneficiary Mobile no" required >
                                                      </div>
                                                  </div>
                                                  <input type="hidden" name="transfer" value="true">
                                                  
                                              </div>
                                              
                                              <div class="text-end">
                                                  <button type="submit" class="btn btn-danger">Fetch Balance</button>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
      <?php
    }
    
    
    

}else{
    ?>
      <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Balance Transfer ENTER USER MOBILE NO ONLY</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>ENTER USER MOBILE NO ONLY:</label>
                                                        <input type="number" class="form-control" maxlength="10" name="mobile"  placeholder="Enter beneficiary Mobile no" required>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="transfer" value="true">
                                                
                                            </div>
                                            
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">Fetch Balance</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
}
?>
              
        
              </div>
        
        
        
        
<footer class="footer">
                <span>Copyright © 2022&nbsp; Aadharupdateucl . All rights reserved.</span>
            </footer>      </section>

    </div>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>