<?php 
if(!isset($_SESSION))
{ 
    session_start(); 
} 
include('includes/config.php');
if(isset($_SESSION['loggedin']) == true){
  ?>
  <script> 
  window.setTimeout(function() {
  window.location.href = "admin";
  }, 1500);
  </script>
  
    <?php
}  
if(isset($_POST['secret']) && $_POST['secret'] == "ahkwebsolutions" && !empty($_POST['username']) && !empty($_POST['password'])){
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  $res = mysqli_query($conn,"SELECT * FROM `usertable` WHERE phone='$username'  OR emailid='$username' OR userid='$username'  ");

  if(mysqli_num_rows($res) == 1 ){
    $userdata = mysqli_fetch_assoc($res);
    $vpass = password_verify($password,$userdata['password']);
    if($vpass){
      if($userdata['status'] == "verified"){
        
        if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        ?>
			<script>
				$(function(){
					Swal.fire(
						'Success!',
						'You Are Logged In Successfully!',
						'success'
					)
				});
			</script>
			<?php
      
      $_SESSION['loggedin'] = true;
      $_SESSION['userid'] = $userdata['userid'];
      $_SESSION['name'] = $userdata['name'];
      $_SESSION['emailid'] = $userdata['emailid'];
      $_SESSION['phone'] = $userdata['phone'];
      $_SESSION['walletamount'] = $userdata['walletamount'];
      $_SESSION['usertype'] = $userdata['usertype'];
     
      ?>
      <script>
      window.setTimeout(function() {
      window.location.href = "admin";
      }, 1500);
      </script>
      
        <?php

        // 
      }else{
        ?>
        <script>
          $(function(){
            Swal.fire(
              'Opps!',
              'Your Account is Blocked or inactive Please Contact With Admin',
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
            'Opps!',
            'Password Wrong!',
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
          'Opps!',
          'Entered username Wrong or Not Exist',
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
    <title><?php echo $ahkweb['name'] ?>| LOGIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">.</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        
        
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
       
               
        <!-- Full Screen Search End -->


        <!-- Contact Start -->
  </style>
</head>
<body style="background-color: transparent;">
  <main>
    <div class="container" style="font-family: Arial;font-size: 11px;">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3" style="border: 5px solid black;">
			    <div class="card-body" style="background-color:black;padding: 0px;">
				<h4 align="right" style="padding: 0px;margin: 0px;"><b style="color:white;">Aadhaar Login</b><img src="assets/img/login.png" style="width: 35px;vertical-align: middle;"> </h4>
				</div>
                <div class="card-body">
                  <form class="row g-0 needs-validation" novalidate action="" method="POST">				  
                    <div class="col-6">
					<img src="assets/img/aadhar_logo.png" width="100%" alt="">
                    <p align="center">Enrolment Update Client (Lite Edition)</br>version 3.3.0.0</p>
                                        </div>
					<div class="col-6">
					  <div class="pt-0 pb-0">                    
											  </div>
                      Operator UID
                      <div class="input-group has-validation"> 
                        <input type="hidden" name="secret" value="ahkwebsolutions">
                        <input type="text" class="form-control" style="text-transform:uppercase" id="username" name="username" placeholder="Enter Email or Mobile Number">
                      </div>
					  Password
                      <div class="input-group has-validation">                        
                        <input type="password" class="form-control"  id="password" name="password" placeholder="Password">
                      </div>
					  <div class="buttons" align="right">
                            <button style="margin: 3.75px" type="submit" name="login_btn" class="btn btn-primary w-100">Login</button>
                            <h5 style="margin-top: 20px;">
					<span>OR</span>
					<div style="font-size: 15px; font-weight: 400">Continue with</div>
					</h5>	
					<h4 style="text-align: center; font-size: medium; font-weight: 500;">
						New user? <a href="https://wa.link/qye74h" class="text-primary cursor-pointer font-weight-bold" id="btnRegisterNow">Sign up for
							UCL</a>
                      </div>
                    </div>					                 
                  </form>
                </div>
				<div class="card-body" style="background-color:#84a9d8;padding: 0px;">
				<p align="center" style="padding-top: 10px;"><b style="color:black;">Copyright (c) UID Authority of India, all rights reserved</p>
				</div>
              </div>
            </div>
          </div>
        </div>  

                
        <!-- Contact End -->
        

        <?php
include('footer.php');
?>

        <!-- Footer Start -->
       