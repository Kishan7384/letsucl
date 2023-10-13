<?php
include('../includes/config.php');
if (!isset($_SESSION['loggedin']) == true) {
?>
    <script>
        window.location.href = '../login.php';
    </script>
<?php
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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
          
                <img src="img/logo.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="d-none d-sm-inline-block brand-text font-weight-light">Aaadhar UCL</span>
     
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Mobile Link UID
            </div>
   <!-- Nav Item - Pages Collapse Menu -->
   <?php
                        if($_SESSION['userid'] == "ADMIN" ){
                        
                            ?>
   <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
                    aria-expanded="true" aria-controls="users">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                   
                        <a class="collapse-item" href="adduser.php">Add User</a>
                        <a class="collapse-item" href="userlist.php">User List</a>
                        <a class="collapse-item" href="transfer.php">Balance Transfer</a>
                    </div>
                </div>
            </li>
            <?php
                        }
                        ?>
                          <?php
                        if($_SESSION['userid'] == "SUPER ADMIN" ){
                        
                            ?>
   <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
                    aria-expanded="true" aria-controls="users">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                   
                        <a class="collapse-item" href="adduser.php">Add User</a>
                     
                        <a class="collapse-item" href="userlist.php">User List </a>
                        <a class="collapse-item" href="transfer.php">Balance Transfer</a>
                    </div>
                </div>
            </li>
            <?php
                        }
                        ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <?php
                        if($_SESSION['userid'] == "ADMIN" OR ""){
                        
                            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#request"
                    aria-expanded="true" aria-controls="request">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pending Requests</span>
                </a>
                <div id="request" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM qrtxn WHERE status='pending' ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                    
                        <a class="collapse-item" href="paymentreq.php">Pending Payments <span class="badge badge-danger badge-counter"><?php echo $rorw['cnt']; ?></span></a>
                        <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE status='pending' ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="pendingwork.php">Pending Applications <span class="badge badge-success badge-counter"><?php echo $rorw['cnt']; ?></span></a>
                        <a class="collapse-item" href="transfer.php">Balance Transfer</a>
                    </div>
                </div>
            </li>
            <?php
                        }
                        ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#apply"
                    aria-expanded="true" aria-controls="apply">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Mobile Link UID </span>
                </a>
                <div id="apply" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add-customer.php">New Entry</a>
                        <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE appliedby='$s_phone' AND status='pending'   ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                    
                        <a class="collapse-item" href="customerlist.php">List <span class="badge badge-info badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                          <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE  appliedby='$s_phone'AND status='success'    ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="customerlistsuccess.php">All Approved Data <span class="badge badge-info badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                        
                       
                    </div>
                </div>
            </li> 
            
            <?php
                        if($_SESSION['userid'] == "ADMIN" OR ""){
                        
                            ?>

            <div class="sidebar-heading">
               Admin Reports
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report"
                    aria-expanded="true" aria-controls="report">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Admin Reports</span>
                </a>
                <div id="report" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Payment Report</h6>
                            <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE status='pending' ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="allpending.php">All Pending Applications <span class="badge badge-warning badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                            <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM customers WHERE status='success' ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <a class="collapse-item" href="allsuccess.php">All Success Applications <span class="badge badge-success badge-counter"><?php echo $rorw['cnt']; ?></span> </a>
                        <a class="collapse-item" href="uclwalletreport.php">Wallet Report</a>
                        
                    </div>
                </div>
            </li>
            <?php
                        }
                        ?>
                           <?php
                        if($_SESSION['userid'] == "ADMIN" OR ""){
                        
                            ?>
   <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting"
                    aria-expanded="true" aria-controls="setting">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
                <div id="setting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                   
                        <a class="collapse-item" href="settings.php">Website Setting</a>
                        <a class="collapse-item" href="notifi.php">Send Notification </a>
                    </div>
                </div>
            </li>
            <?php
                        }
                        ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

 <!-- Heading -->
            <div class="sidebar-heading">
                Wallet Section
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Add Wallet </span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="https://service4public.in/ucl/admin/wallet.php">Add Balance</a>
                        
                    </div>
                </div>
            </li>
            
            <!-- Nav Item - Charts -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Driver 
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Download Drivers</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="https://download.mantratecapp.com/StaticDownload/MFS100Driver_9.2.0.0.exe">Mantra Driver v9.2.0.0</a>
                        <a class="collapse-item" href="https://download.mantratecapp.com/StaticDownload/MFS100ClientService_9.0.3.8.exe">Mantra Client Service v9.0.3.8</a>
                        <a class="collapse-item" href="https://download.mantratecapp.com/StaticDownload/MantraRDService_1.0.4.exe">Mantra RD Service v1.0.4</a>
                        <a class="collapse-item" href="https://play.google.com/store/apps/details?id=com.mantra.clientmanagement&hl=en_IN&gl=US">Android Client Service v9.0.3.8</a>
                    </div>
                </div>
            </li>
            
            <!-- Nav Item - Charts -->
          

            <!-- Nav Item - Tables -->
           
            <a class="btn btn-danger" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                        <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM contact ";
                                                $rr = mysqli_query($conn,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?php echo $rorw['cnt']; ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                               
                               
                             
                               
                                <a class="dropdown-item d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="query.php">See All  <span class="badge badge-danger badge-counter"><?php echo $rorw['cnt']; ?></span></a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $udata['name']; ?> </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                              
                                <a class="dropdown-item h6 mb-0 font-weight-bold text-gray-800" href="wallet.php">
                                 
                                   ₹ <?php echo $udata['walletamount']?>
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                