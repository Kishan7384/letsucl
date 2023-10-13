<?php
include('../includes/config.php');
    

if (isset($_GET['id']) && $_GET['id'] != NULL) {
    $id = base64_decode($_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM `customers` WHERE id='$id'");
    $data = mysqli_fetch_assoc($res);
}


if (isset($_POST['ahkweb'])  && $_POST['ahkweb'] == "ahkwebsolutions") {
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

    $username = $_SESSION['phone'];
    $ires = mysqli_query($conn,"UPDATE `usertable` SET `name`='$name', `emailid`='$email', phone='$phone', `walletamount`='$walletamount',`panwallet`='$panwallet',`state`='$state',`city`='$city',`password`='$password',`status`='$status', `usertype`='$usertype' WHERE userid='$id' ");    

    if($ires){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Success',
                    'User Updated Successfully',
                    'success'
                )
            });
        </script>
        <?php
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Internal Server Error Please try Agin Later',
                    'error'
                )
            });
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $ahkweb['name']; ?> | Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Datatable Dependency start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>


</head>
<body id="page-top">
      <div class="container-fluid">
           
<section class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-default">
                        Edit Customer </div>
                    <div class="card-body">
                          <button id="sidebarToggleTop" class="btn btn-link m-md-none rounded-circle mr-3">
                        <a target="_self" href="../allpending.php"><i class="fa fa-home"></i></a>
                    </button>
                        <form id="regform" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off" onsubmit="myButton.disabled = true; return true;">
                            <div>
                               
                             
                                <a href="editfinger.php?id=<?php echo base64_encode($data['id']) ?>" class="btn btn-warning mt-4 mb-2">fingerprint Brightness</a>
                            </div>
                            

                            <div class="form-group">
                                <div class="row">
                                <div class="col-md-2">
                                        <label for="appliedby">Username or Applied By</label>
                                        <input readonly="" type="text" class="form-control" placeholder="<?php echo $data['appliedby'] ?>" disabled="">
                                    </div>
                                    <div class="col-md-3">
                                    <label for="Full Name">Full Name</label>
                                        <input type="text" readonly="" placeholder="Full Name" id="fullname" name="fullname" class="form-control" value="<?php echo $data['name'] ?>" required="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="fname">father Name</label>
                                        <input type="text" readonly="" placeholder="Father Name" id="fname" name="fname" class="form-control" value="<?php echo $data['fname'] ?>" required="">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="birthdate">Date of Birth</label>
                                        <input type="text" readonly="" placeholder="birthdate" id="birthdate" name="birthdate" class="form-control" value="<?php echo $data['dob'] ?>" required="">
                                    </div>
                                   
                                    <div class="col-md-2">
                                        <label for="Aadhaar">Aadhaar No.</label>
                                        <input readonly="" type="text" class="form-control" placeholder="<?php echo $data['aadhaar_no'] ?>" disabled="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="MobileNo">Mobile No.</label>
                                        <input id="mobileno" readonly="" name="mobile" type="text" class="form-control" value="+91 <?php echo $data['mobile_no'] ?>" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Email">Email ID</label>
                                        <input type="email" readonly="" name="email" value="<?php echo $data['email'] ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Purpose">Purpose</label>
                                        <input type="text" readonly="" id="purpose" name="purpose" class="form-control" value="<?php echo $data['purpose'] ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                        <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger1'] ?>"> <img src="<?php echo $data['finger1'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                  
                                                </div>
                                                <input class="form-control" type="hidden" id="pic1" name="photo1">
                                                <div style="width:100px;height:auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim1" alt="">
                                                </div>

                                               </a>

                                                <h5 id="q1" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                     <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger2'] ?>"> <img src="<?php echo $data['finger2'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic2" name="photo2">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim2" alt="">
                                                </div>
                                               
                                                <h5 id="q2" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                    <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger3'] ?>"> <img src="<?php echo $data['finger3'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic3" name="photo3">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim3" alt="">
                                                </div>
                                                
                                                <h5 id="q3" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                     <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger4'] ?>"> <img src="<?php echo $data['finger4'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic4" name="photo4">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim4" alt="">
                                                </div>
                                              
                                                <h5 id="q4" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="watermark">
                                                  <a  data-fancybox="gallery"  data-height="200px"  href="<?php echo $data['finger5'] ?>"> <img src="<?php echo $data['finger5'] ?>"id="im1"class="img-fluid rounded-end border p-1">
                                                </div>
                                                <input class="form-control" type="hidden" id="pic5" name="photo5">
                                                <div style="width:100px; height : auto" class="text-center mt-2">
                                                    <img src="assets/img/check.png" style="display:none; width:205px;" id="cim5" alt="">
                                                </div>
                                               
                                                <h5 id="q5" class="text-center mt-3"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
									<button type="submit" name="myButton" class="btn btn-success btn-icon"><i class="fa fa-floppy-o"></i>Submit</button>
							</div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
     </section>
    <!-- Content Header (Page header) -->
  

    <!-- /.content -->


</div>
<!-- /.content-wrapper -->

<!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> -->

<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- </aside> -->
<!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function alertMessage(type, message) {
        if (type == 'error') {
            type = 'danger';
        }

        return "<div class='alert alert-" + type + " alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> " + message + " </div>";
    }
</script>



</body>

</html>