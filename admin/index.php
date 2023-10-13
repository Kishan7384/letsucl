<?php 
include('header.php');
include('../includes/config.php');
if (isset($_POST['txn_form']) && $_POST['txn_form'] == "ahkwebsolutions"  ){
  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $sub = mysqli_real_escape_string($conn, $_POST['sub']);
  $mess = mysqli_real_escape_string($conn, $_POST['mess']);
  $res = mysqli_query($conn,"INSERT INTO `contact`(`name`, `email`, `sub`, `mess`) VALUES ('$name','$email','$sub','$mess')");
  if($res){
      ?>
      <script>
          $(function(){
              Swal.fire(
                  'Success',
                  'Message Send Successfully',
                  'success'
              )

          });
           
  window.setTimeout(function() {
  window.location.href = "index.php";
  }, 1500);
      </script>
      <?php
  }else{
      ?>
      <script>
          $(function(){
              Swal.fire(
                  'Opps',
                  'Internal Server Problem Please Try Again Lates!',
                  'error'
              )

          });
      </script>
      <?php

  }
  
}
?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
    
    <font color="black"> <b> <font size="6px"><marquee bgcolor="white"> 
आपके पास जो भी कस्टमर मोबाइल नंबर लिंक के लिए आये पहले उनका फिंगर चेक कर ले की आधार कार्ड डाउनलोड हो रहा है या नहीं </marquee><b><b><b><b><b>

   
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        
                
                        
                       <form method="post" action="pgpayment/index.php">

                                     <div class="input-group mb-4">
                                   
                                                              <input tabindex="2" type="hidden" maxlength="15" size="15" name="emailid" autocomplete="off" value="<?php echo $udata['emailid'];?>">
                                
                                     <input type="number" class="form-control" min="" id="amount" name="amount" required="" placeholder="ENTER AMOUNT">
                                     <input tabindex="3" type="hidden" maxlength="15" size="15" name="phone" autocomplete="off" value="<?php echo $udata['phone'];?>">
                                   <input tabindex="3" type="hidden" maxlength="15" size="15" name="name" autocomplete="off" value="<?php echo $udata['name'];?>">
                                     </div>

                                     <button class="btn-dark" style="width:70%"> Add Money </button> <img src="https://www.logo.wine/a/logo/Paytm/Paytm-Logo.wine.svg" alt="" width="40" height="30">
                                     

                                 </form>
                        
                        </div>
                      
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rs <?php echo $udata['walletamount']?></div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
  
    <?php 
    
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers where appliedby='$s_phone'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Applications</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers where appliedby='$s_phone' AND status='reject'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Reject Applications</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' && status='success'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Success Applications
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' && status='pending'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
  <?php
                        if($_SESSION['userid'] == "ADMIN" ){
                        
                            ?>

<!-- Content Row admin -->
<div class="row">
    <?php 
    
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM usertable ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        
                        <a href="adduser.php" class=" btn btn-sm btn-dark shadow-sm"><i
            class="fas fa-user-plus fa-sm text-white-50"></i>Add User</a>
                        </div>
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Total Users For Admin Only</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <?php 
    
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Applications For Admin Only</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers where  status='reject'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Reject Applications  For Admin Only</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE  status='success'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Success Applications   For Admin Only
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                            </div>
                               </div>
                            
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE  status='pending'";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Pending Applications  For Admin Only</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rorw['cnt']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php
                        }
                        ?>
<!-- Content Row admin -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-bullhorn"></i> Notification and Message Center</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <?php 
                      
                      $dres = mysqli_query($conn,"SELECT * FROM `newsline` ");
                      if(mysqli_num_rows($dres)>0){
                        while($data = mysqli_fetch_assoc($dres)){
                            ?>
                <div class="panel-body">
                            <div class="list-group">
                                <span href="#" class="list-item text-info">
                                 <h4>   <i class="fa fa-comment fa-fw"></i> <?php echo $data['newstitle']?>


                                                      <span class="pull-right text-primary small"><em><?php echo date('jS F, Y',strtotime($data['date'])) ?></em>
                                    </span>
                        </h4> 
                        </span>
                              
                                </div>  
                            
                            <!-- /.list-group -->
                          
                        </div>
                        <?php
                        }
                      }
                      ?>
                </div>
               
            
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      
            <!-- Card Body -->
          
            
            <div class="card card-default">
              <div class="card-header">
               
                <h6 class="card-title m-0 font-weight-bold text-danger"><i class="fas fa-bullhorn"></i> WELCOME  <?php echo $_SESSION['name'] ?></h6>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-danger">
                  <h5>SEND US MESSAGE</h5>
                </div>
                <form action="" name="contact" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" style="text-transform:uppercase" id="inputName" name="name" placeholder="Full name"value="<?php echo $_SESSION['name'] ?>" required="">
            <input type="hidden" name="txn_form" value="ahkwebsolutions">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
          <input type="text" class="form-control" id="inputEmail"  name="email" placeholder="Please enter your e-mail"value="<?php echo $_SESSION['emailid'] ?>" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
<select name="sub" class="form-control" required>
<option value="">Select</option>
<option value="WALLET UPDATE">WALLET UPDATE</option>
<option value="MOBILE NOT LINK">MOBILE NOT LINK</option>
<option value="CHILD ENROLMENT">CHILD ENROLMENT</option>
<option value="SILIP NOT COME">SILIP NOT COME</option>
<option value="OTHER ISSUE">OTHER ISSUE</option>
</select>
			  
				  </div>
          <div class="input-group mb-3">
          <textarea id="inputName" class="form-control" style="text-transform:uppercase" name="mess" placeholder="Please enter your message"value="" required="" rows="4"></textarea>
                    <div class="input-group-append">
              <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                   </div>
                  </div>
                     </div>
            <div class="input-group mb-3">
              <button type="submit" class="btn btn-primary btn-block">SEND</button>
              <div class="input-group-append">
            </div>
            <!-- /.col -->
          </div>
        </form>
        <div class="card-body">
                <div class="callout callout-success">
                  <h6>CONTACT: <?php echo $ahkweb['phone']?></h6>

                </div>
                </div>
                </div>
              <!-- /.card-body -->
            

<!-- Content Row -->

        





<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include "footer.php";?>