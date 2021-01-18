<?php
    include("Connect.php");
    session_start();
    $profile['Email_User']='';
    $profile['Phone_User']='';
    $profile['Address_User']='';
    $profile['Name_User']='';
    $profile['ID_User']= 1;
    if(isset($_SESSION["Email_User"])){
        $Email_User = $_SESSION['Email_User'];
        $Statement_Users = "SELECT * FROM `users` WHERE Email_User= '$Email_User'";
        $Query_Users =mysqli_query($conn, $Statement_Users);
        $profile = mysqli_fetch_assoc($Query_Users);
    }
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - Ngọc Thành</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Jquery Ui -->
    <link rel="stylesheet" href="css/jquery-ui.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body class="js">
<div class="preloader">
	<div class="preloader-inner">
		<div class="preloader-icon">
			<span></span>
			<span></span>
		</div>
	</div>
</div>
<header class="header shop">
	<div class="middle-inner">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-12">
					<!-- Logo -->
					<div class="logo">
						<a href="index.html"><img src="images/logo.png" alt="logo"></a>
					</div>
					<!--/ End Logo -->
					<!-- Search Form -->
					<div class="search-top">
						<div class="row">
							<div class="col-6"><a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a></div>
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
							</div>
						</div>
					</div>
					<div class="mobile-nav"></div>
				</div>
				<div class="col-lg-10 col-md-10 col-12">
					<div class="right-bar">
						<div class="sinlge-bar">
						<?php
							if ($profile['Email_User']==''){
							echo "<a href='login.php' class='single-icon'><i class='fa fa-user-circle-o' aria-hidden='true'></i></a>";
							}
							else 
							echo "<a href='home.php' class='single-icon'><i class='fa fa-user-circle-o' aria-hidden='true'></i></a>";
							?>
						</div>
						<div class="sinlge-bar shopping">
							<?php
								$counts = 0;
								if(isset($_SESSION['cart'])){
									$items = $_SESSION['cart'];
									$counts = count($items);
								}
								echo "<a href='cart.php' class='single-icon'><i class='ti-bag'> </i> <span class='total-count'> ".$counts."</span></a>";
							?> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Header Inner -->
	<div class="header-inner">
		<div class="container">
			<div class="cat-nav-head">
				<div class="row">
					<div class="col-12">
						<div class="menu-area">
							<!-- Main Menu -->
							<nav class="navbar navbar-expand-lg">
								<div class="navbar-collapse">	
									<div class="nav-inner">	
										<ul class="nav main-menu menu navbar-nav justify-content-center">
											<li class="active"><a href="index.php">Home</a></li>											
											<li><a href="index.php">Service</a></li>
											<li><a href="index.php">Blog</a></li>
											<li><a href="index.php">Contact Us</a></li>
										</ul>
									</div>
								</div>
							</nav>
							<!--/ End Main Menu -->	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Header Inner -->
</header>