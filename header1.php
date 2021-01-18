<?php
    include("Connect.php");
    include("SSUser.php");
    $Email_User = $_SESSION['Email_User'];
    $Statement_Users = "SELECT * FROM `users` WHERE Email_User= '$Email_User'";
    $Query_Users =mysqli_query($conn, $Statement_Users);
    $profile = mysqli_fetch_assoc($Query_Users);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Dashboard Eshop - Ngọc Thành</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">
        <link href="assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                            <?php echo $profile['Name_User']; ?>  <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>
                            <a href="logout.php" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
                <div class="logo-box">
                    <a href="index.php" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="images/logo.png" alt="" height="26">
                        </span>
                        <span class="logo-sm">
                            <img src="images/logo2.png" alt="" height="22">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="left-side-menu">
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Navigation</li>
                        <li>
                            <a href='home.php'>
                                <i class='ti-home'></i>
                                <span> Đơn Hàng </span>
                            </a>
                        </li>
                        <?php
                            if($profile['Position']== 2){
                                echo "<li>
                                <a href='user.php'>
                                    <i class='ti-paint-bucket'></i>
                                    <span> Khách Hàng </span>
                                </a>
                            </li>
    
                            <li>
                                <a href='javascript: void(0);'>
                                    <i class='ti-light-bulb'></i>
                                    <span> Danh Mục </span>
                                    <span class='menu-arrow'></span>
                                </a>
                                <ul class='nav-second-level' aria-expanded='false'>
                                    <li><a href='themdanhmuc.php'>Danh Mục Mới</a></li>
                                    <li><a href='danhmuc.php'>Danh Sách Danh Mục</a></li>
                                </ul>
                            </li>
    
                            <li>
                                <a href='javascript: void(0);'>
                                    <i class='ti-menu-alt'></i>
                                    <span>  Sản Phẩm </span>
                                    <span class='menu-arrow'></span>
                                </a>
                                <ul class='nav-second-level' aria-expanded='false'>
                                    <li><a href='danhsachsanpham.php'>Danh Sách Sản Phẩm</a></li>
                                    <li><a href='themsanpham.php'>Sản Phẩm Mới</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href='javascript: void(0);'>
                                    <i class='ti-pencil-alt'></i>
                                    <span>  Đơn Hàng  </span>
                                    <span class='menu-arrow'></span>
                                </a>
                                <ul class='nav-second-level' aria-expanded='false'>
                                    <li><a href='donhangdagiao.php'>Đã Giao</a></li>
                                    <li><a href='donhangchuagiao.php'>Chưa Giao</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href='danhsachbinhluan.php'>
                                    <i class='ti-spray'></i>
                                    <span> Bình Luận </span>
                                </a>
                            </li>
    
                            <li>
                                <a href='index.php'>
                                    <i class='ti-location-pin'></i>
                                    <span> Cửa Hàng </span>
                                </a>
                            </li>";
                            }
                            
                        ?>
                        
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
