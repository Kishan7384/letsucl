<?php
include('includes/config.php');
if (isset($_POST['reg']) && $_POST['reg'] == "ahkweb"  ) {
  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $profilepic = mysqli_real_escape_string($conn, $_POST['profilepic']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

  if (!empty($password) && !empty($cpassword) && $phone != "ADMIN" && $email != "ADMIN") {
    if ($password == $cpassword) {

      $fpassword = password_hash($cpassword, PASSWORD_DEFAULT);
      $checksql = mysqli_query($conn, "SELECT * FROM usertable WHERE emailid='$email' OR phone='$phone'");
      if (
        !empty($name) &&
        !empty($phone) &&
        !empty($email) &&
        !empty($password) &&
        !empty($cpassword)
      ) {
        if (mysqli_num_rows($checksql) == 0) {
    
          $sql = "INSERT INTO `usertable` (`phone`, `emailid`, `name`,`psaid`,`cprize`, `password`, `city`, `state`, `userid`, `status`, `profilepic`, `createdby`, `joineddate`, `joinedtime`, `usertype`, `walletamount`,`otp`) VALUES ('$phone', '$email', '$name','NOT ALOTED', '98',  '$fpassword', 'cc', 'sdds', '$phone', 'verified', '$profilepic', NULL, '', '', 'OPERATER', '0','');";
          $res = mysqli_query($conn,$sql);
          // 
          if($res){
            ?>
            <script>
              // alert('Your Account Register Successfully!, You can Login');
              $(function() {
        Swal.fire(
            'Success',
            'Register Successfully You can Login',
            'success'
        )
    });

  
  window.setTimeout(function() {
  window.location.href = "login.php";
  }, 1500);

    
            </script>
            <?php
          }else{
            ?>
            <script>
              // alert('Account Not Created ,Try Again!!');
              $(function(){
                Swal.fire(
                  'Opps!',
                  'Internet Server Error, Please Try Again Later!',
                  'error'
                )
    
              });
            </script>
            <?php
          }
          // 
        }else{
          ?>
          <script>
            // alert('Your  email or phone  already exist!');
            $(function() {
        Swal.fire(
            'Opps!',
            'Your  email or phone  already exist!',
            'error'
        )
    });
      
  window.setTimeout(function() {
  window.location.href = "reg.php";
  }, 1500);
          </script>
          <?php
        }
      }else{
        ?>
        <script>
             $(function() {
        Swal.fire(
            'Opps!',
            'Please Fill All data',
            'error'
        )
    });
        </script>
        <?php
      }
    }else{
      // echo "Confirm Password Not Match";
      ?>
      <script>
           $(function() {
    Swal.fire(
        'Opps!',
        'Confirm Password Not Match!',
        'error'
    )
});
      </script>
      <?php
    }
  }else{
    ?>
      <script>
           $(function() {
    Swal.fire(
        'WOW trying to Cheat!!!',
        'You Are A Cheater  GET OUT!',
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
    <title><?php echo $ahkweb['name'] ?>| REGISTER</title>
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


        <?php include('nav.php'); ?>
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
       
               
        <!-- Full Screen Search End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
         
         <div class="row g-5">
         <div class="col-lg-6">
                 <img class="img-fluid wow zoomIn" class="floating-center"data-wow-delay="0.5s" src="img/about.jpg">
             </div>
             <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                 <div class="section-title position-relative mb-4 pb-2">
                     <h6 class="position-relative text-primary ps-4">Join Us</h6>
                     <h2 class="mt-2">Register Now!</h2>
                 </div>
                 <p class="mb-4">.</p>
                
                 <form action="" method="POST">
                         <div class="row g-3">
                             <div class="col-md-6">
                                 <div class="form-floating"> 
                                 <input type="hidden" name="reg" value="ahkweb">
                                     <input type="text" class="form-control" style="text-transform:uppercase" id="name" name="name" placeholder="Your Name"required="" >
                                     <label for="name">Your Name</label>
                                 </div>
                             </div>
                             <div class="col-md-6" >
                             <div class="col-md-6">
								       <img src="" id="blah" width="150px" height="150px" style="display: none;" alt="User profile picture">
							     </div>
                      <input  type="file" class="form-control" id="profilepic" name="profilepic" required="">
                         <label for="profilepic" >Upload Image</label> 
                               </div>
                             <div class="col-12">
                                 <div class="form-floating">
                                     <input type="number" class="form-control" id="phone" name="phone" placeholder="Your Email" required="">
                                     <label for="Mobie No">Your phone No.</label>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="form-floating">
                                     <input type="email" class="form-control" style="text-transform:uppercase" id="email" name="email" placeholder="Your Email Id">
                                     <label for="email">Your Email Id</label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="passwoard" class="form-control" style="text-transform:uppercase" id="password" name="password" placeholder="password" required="" >
                                     <label for="password">Passwoard</label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="cpassword" class="form-control" style="text-transform:uppercase" id="cpassword" name="cpassword" placeholder="conform password" required="" >
                                     <label for="email">Conform Passwoard</label>
                                 </div>
                             </div>
                        
                             <div class="col-12">
                                 <button class="btn btn-success w-100 py-3" type="submit">Register</button>
                             </div>
                         </div>
                     </form>
                     <div class="col-12">
                                 <a class="btn btn-danger w-100 py-3" href="login.php">Already Register - Login Now!</a>
                             </div>
                     <div class="d-flex align-items-center mt-4">
                     
                     <a class="btn btn-outline-warning btn-square me-3" href="https://wa.me/918052940168?text=Hello%20Sir!%20"><i class="fa-brands fa-whatsapp"></i></a>
                     <a class="btn btn-outline-info btn-square me-3" href="https://wa.me/918052940168?text=Hello%20Sir!%20"><i class="fab fa-facebook-f"></i></a>
                     <a class="btn btn-outline-success btn-square me-3" href="https://wa.me/918052940168?text=Hello%20Sir!%20"><i class="fab fa-instagram"></i></a>
                     <a class="btn btn-outline-primary btn-square" href="https://wa.me/918052940168?text=Hello%20Sir!%20"><i class="fab fa-twitter"></i></a>
                 </div>
                 </div>
                
        <!-- Contact End -->
        
        <script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#blah").hide();
$("#profilepic").change(function(){
    readURL(this);
	$("#blah").show();
});	


function readURLs(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blahs').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#blahs").hide();
$("#signInp").change(function(){
    readURLs(this);
	$("#blahs").show();
});
</script>

        <?php
include('footer.php');
?>

        <!-- Footer Start -->
       