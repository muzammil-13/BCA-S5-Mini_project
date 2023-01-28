<!DOCTYPE html>
<?php include("conn.php"); 
session_start();
if(isset($_SESSION['admloggedin'])&&($_SESSION['admloggedin']==true))
{
?>
<html lang="zxx">
<head>
	<title>EndGam - Gaming Magazine Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/card"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="index.html" class="site-logo">
					<img src="./img/logo.png" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<a href="">admin</a><?php echo "&nbsp&nbsp&nbsp"?>
						<a href="logout.php">Logout</a>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="admin.php">Home</a></li>
						<li><a href="adm_games.php">Games</a></li>
						<li><a href="addgame.php">addgames</a></li>
						<li><a href="sale.php">Sales</a></li>
						<li><a href="view_users.php">view users</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
		<div class="page-info">
			<h2>Admin</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>admin</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- Contact page -->
	<section style="padding: 104px 0;
	background: #501755;
	background: linear-gradient(45deg, #501755 0%, #2d1854 100%);
	display: flex; justify-content: center; align-items: center;">
   

    <div class="card" id="test">
    <button onclick="location.href='adm_games.php'">total games:<br><br><br><br><?php $sql = "SELECT COUNT(*) as count FROM `tbproduct`";
    $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row["count"];
    echo $count?></button>
    </div>
    <div class="card">
   <button onclick="location.href='view_users.php'">total users:<br><br><br><br><?php $sql = "SELECT COUNT(*) as count FROM `user`";
    $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row["count"];
    echo $count?></button>
    </div> <div class="card">
   <button onclick="location.href='sale.php'">total sales:<br><br><br><br><?php $sql = "SELECT COUNT(*) as count FROM `tbsale`";
    $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row["count"];
    echo $count?></button>
    </div>
    
	</section>
	<!-- Contact page end-->





	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.sticky-sidebar.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
<?php
 }
 else
 {
	 $_SESSION['url']=$_SERVER['REQUEST_URI'];
	 echo "<script>alert('Please login'); window.location.href='login.php';</script>";
 }
 ?>