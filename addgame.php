<?php include("conn.php"); 
session_start();
if(isset($_SESSION['admloggedin'])&&($_SESSION['admloggedin']==true))
{
 ?>
<!DOCTYPE html>
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
	<?php include("admheader.php");
	?>

	
	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
		<div class="page-info">
			<h2>Contact</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>Contact</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- Contact page -->
	<section class="contact-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 order-2 order-lg-1">
					<form class="contact-form" method="post" action="#" enctype="multipart/form-data">
						<input type="text" placeholder="game name" name="nm">
						<input type="text" placeholder="genre" name="g">
						<input type="text" placeholder="console" name="con">
						<textarea placeholder="descrition" resize="none" name="descp"></textarea>
						<div class="page-info" style="display: flex; flex-direction: row;width:100%">
						<div>
						<input type="number" style="width:50%" name="pr"placeholder="price"></div>
						<label>IMAGE:</label><div style="width:50%"><input class="form-control" type="file" name="img" value="" /></div>
						</div>
						<button class="site-btn" type="submit" name="game">add game<img src="img/icons/double-arrow.png" alt="#"/></button>
					</form>
				</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact page end-->

<?php 
if(isset($_POST["game"]))
{
	$name=$_POST["nm"];
	$price=$_POST["pr"];
	$descp=$_POST["descp"];
	if(!empty($_FILES['img'])){
		$path = "img/product/";
		$path=$path. basename($_FILES['img']['name']);
		move_uploaded_file($_FILES['img']['tmp_name'], $path);

	}

	$filename = $_FILES["img"]["name"];
	$tempname = $_FILES["img"]["tmp_name"];
	$img = "img/product/" . $filename;
	$genre=$_POST["g"];
	$con=$_POST["con"];
	$sql="INSERT INTO `tbproduct` (`idproduct`, `pname`, `price`, `photo`, `genre`, `console`, `descp`) VALUES (NULL, '$name', $price, '$img', '$genre', '$con', '$descp');";
	$result = mysqli_query($dbc, $sql);
}
?>

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
<?php }
    else
    {
        $_SESSION['url']=$_SERVER['REQUEST_URI'];
        echo "<script>alert('Please login'); window.location.href='login.php';</script>";
    }
?>