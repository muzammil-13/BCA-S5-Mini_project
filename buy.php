<!DOCTYPE html>
<?php include("conn.php");
session_start();
if(isset($_SESSION['loggedin'])&&($_SESSION['loggedin']==true))
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

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	
    <!-- Header section -->
	<?php include("header.php");
	//Header section end 
	if(isset($_GET['gameid'])) {
    $id=$_GET['gameid'];
    $query = "SELECT idproduct,pname,price,photo,genre,console,descp FROM tbproduct WHERE idproduct=$id";
    $result = mysqli_query ($dbc, $query); 
    $row = mysqli_fetch_array($result);
    ?>
	<!--page top--> 
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg">
		<div class="page-info">
			<h2>Games</h2>
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>  /
				<span>buy </span>
			</div>
		</div>
	</section>
    <!-- Featured section -->

	<section class="featured-section">
		<div class="featured-bg set-bg" data-setbg="<?php echo $row['photo'];?>"></div>
		<div class="featured-box">
			<div class="text-box">
				<div class="top-meta"><?php echo $row['pname'];?><a href=""> / <?php echo $row['genre'];?></a></div>
				<p><?php echo $row['descp'];?></p>
				<a href="#" class="read-more" onclick="if (confirm('Are you sure you want to buy <?php echo $row['pname']; ?>?')) { window.location.href = 'buy.php?gameid=<?php echo $id ?>&buy=true'; } else { window.location.href = 'index.php'; }">BUY NOW</a> <img src="img/icons/double-arrow.png" alt="#"/></a>
			</div>
		</div>
	</section>
	<!-- Featured section end-->
    <?php
    if((isset($_GET['buy']))&&($_GET['buy']==true))
    {   
        $pdate = date("Y-m-d");
        $query = "SELECT idproduct,pname,price,photo,genre,console,descp FROM tbproduct WHERE idproduct=$id";
        $result = mysqli_query ($dbc, $query); 
        $row = mysqli_fetch_array($result);
        $price=$row['price'];
        $uid=$_SESSION['uid'];
		$query ="INSERT INTO `tbsale`(`idsale`, `datesale`, `price`, `idclient`, `idproduct`) VALUES (NULL,'$pdate','$price',$uid,$id);";
		$result=mysqli_query($dbc,$query);
		echo $result;
		if($result)
		{
			echo "<script>alert('Sucess!!'); window.location.href='admgames.php';</script>";
			header("Location: library.php" );
			exit;
		}       
		else {
		
			echo "<script>alert('something went wrong!!\nplease try again'); window.location.href='admgames.php';</script>";
		}
    }
    ?>	




	<!-- Footer section -->
	<?php }
    include("footer.php"); ?>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.sticky-sidebar.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
    <?php
    }
    else
    {
        $_SESSION['url']=$_SERVER['REQUEST_URI'];
        echo "<script>alert('Please login'); window.location.href='login.php';</script>";
    }
    ?>
</html>
