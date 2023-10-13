<?php
include('header.php');

if ($_SESSION['userid'] != "ADMIN") {
?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
    die;
}
$res = mysqli_query($conn, "SELECT * FROM `qrtxn`  WHERE status='pending'");
if (isset($_POST['delete']) && $_POST['delete'] == "ahkwebsolutions") {
    $id = base64_decode($_POST['id']);
    $del = mysqli_query($conn, "DELETE FROM `qrtxn` WHERE id='$id'");
    if ($del) {
    ?>
        <script>
            $(function() {
                Swal.fire(
                    'Success',
                    'Data Deleted Success!',
                    'success'
                )
            });
             
  window.setTimeout(function() {
  window.location.href = "paymentreq.php";
  }, 1500);
        </script>
    <?php
    } else {
    ?>
        <script>
            $(function() {
                Swal.fire(
                    'Opps',
                    'Data Not Deleted !',
                    'error'
                )
            });
        </script>
<?php
    }
}
// Approve 

if (isset($_POST['approve']) && $_POST['approve'] == "ahkwebsolutions" && $_POST['accesspin'] != NULL) {
    $accesspin = mysqli_real_escape_string($conn,$_POST['accesspin']);
    $emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
    $amount = mysqli_real_escape_string($conn,$_POST['amount']);

    if($ahkweb['accesspin'] == $accesspin){
        $ndata = mysqli_query($conn,"SELECT * FROM usertable WHERE emailid='$emailid'");
        $sddata = mysqli_fetch_assoc($ndata);
        $newamount = $sddata['walletamount'] + $amount;
        $approve_sql = mysqli_query($conn,"UPDATE `qrtxn` SET `status`='APPROVED'  WHERE emailid='$emailid'");
        $credit = mysqli_query($conn,"UPDATE `usertable` SET walletamount='$newamount' WHERE emailid='$emailid'");
        if($approve_sql && $credit){
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Success',
                        'Payment Credit Successfully',
                        'success'
                    )

                });
                window.setTimeout(function(){
                    window.location.href='';
                },1100);
            </script>
            <?php
        }
    }else{
        ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Success',
                        'Access PIN Incorrect!',
                        'error'
                    )

                });
                
            </script>
            <?php

    }
    
   
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Payment Requests</h1>
                </div><!-- /.col -->
               
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-body">


                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;" class="text-center">Email</th>
                                        
                                        <th style="width: 120px;" class="text-center">UPI id</th>

                                        <th class="text-center" style="width:100px;">Amount</th>
                                        <th style="width: 120px;" class="text-center">TXN id</th>
                                        <th style="width: 200px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($data = mysqli_fetch_array($res)) {
                                           
                                    ?>
                                            <tr>
                                                <td class="text-center"><?php echo $data['emailid'] ?></td>
                                                
                                                <td class="text-center"><?php echo $data['upi'] ?></td>

                                                <td class="text-center"><?php echo $data['amount'] ?></td>

                                                <td class="text-center"><?php echo $data['txnid'] ?></td>
                                                <td class="text-center">


                                                  

                                                    <form action="" method="post" class="d-inline">
                                                        <input required type="password" placeholder="Access PIN" name="accesspin" value="">
                                                        <input type="hidden" name="amount" value="<?php echo $data['amount'] ?>">
                                                        <input type="hidden" name="emailid" value="<?php echo $data['emailid'] ?>">
                                                        
                                                        <input type="hidden" name="approve" value="ahkwebsolutions"> 
                                                        <button type="submit"  class="btn btn-success btn-sm ml-2" ><i class="fa fa-check"></i></i></button>
                                                    </form>

                                                    <form action="" method="post" class="d-inline">
                                                        <input type="hidden" name="id" value="<?php echo base64_encode($data['id'])  ?>">
                                                        <input type="hidden" name="delete" value="ahkwebsolutions"> <input type="hidden" name="_method" value="DELETE"> <button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                    
                                        }
                                        
                                    }
                                    ?>




                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
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
</div>
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

<script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    function deleteRecord(th) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value == 1) {
                $(th).parent().submit();
            }
        });
    }
</script>

</body>

</html>