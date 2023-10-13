
<?php
include('includes/config.php');

$res = mysqli_query($conn, "SELECT * FROM `customers` WHERE status='pending'  ORDER BY id ASC ");
if(isset($_POST['delete']) && $_POST['delete'] == "ahkwebsolutions"){
    $id = base64_decode($_POST['id']);
    $del = mysqli_query($conn,"DELETE FROM `customers` WHERE id='$id'");
    if($del){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Success',
                    'Data Deleted Success!',
                    'success'
                )
            });
            window.setTimeout(function() {
  window.location.href = "allpending.php";
  }, 1500);
        </script>
        <?php
    }else{
        ?>
        <script>
            $(function(){
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
?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>aUCL</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                          <tr>  
                               <td>Sr. NO.</td>
                                
                               <td>Data Copy</td>
                               <td>Finger</td>
                        
                                <td>Status</td>
                                <td>Data Date</td>
                                <td>Delete</td>
                                
                                </tr>
                        </thead>
                
                            
                                                                                    
 <?php
                                    if(mysqli_num_rows($res)>0){
                                        $slno = 1;
                                        while($data = mysqli_fetch_array($res)){
                                            ?>
                           <tr> 
                                <td >  <?=$x?> </td>
                                <td >
                                  USER ID  <?=$b['operator_uid']?><br>
                                                                    USER ID2  <?=$b['operator_id']?><br>

                                 NAME:-  <?php echo $data['name'] ?><br>
                                ADHAR No:-  <?php echo $data['aadhaar_no'] ?><br>
                                MOBILE NO:- <?php echo $data['mobile_no'] ?><br>
                                UPADATE:-   <?php echo $data['purpose'] ?><br>
                                emaild :-<?php echo $data['email'] ?><br>
                                District :-<?=$b['district']?><br>
                                </td>
                                <td align="center"> <a target="_blank" href="data/editfinger3.php?id=<?php echo base64_encode($data['id']) ?>"> Finger<i class="fa fa-eye" aria-hidden="true"></td>

                                 <td >  <?=$b['status']?> </td>
                                 <td >  <?=$b['doi']?> </td>
                                 <td align="center" valign="middle">
                                            <form action="active.php" method="post" enctype="multipart/form-data" >
                                                <input name="id" type="hidden" value="<?= $b['id'] ?>" />
                                                <button style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" class="btn btn-danger" type="submit"/>
                                                <i class="fa fa-trash" style="color:black"></i> Delete</button>
                                                   </form>
                                </tr>
                               
                   <?php } ?>
                   <?php } ?>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  