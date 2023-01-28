<?php include("conn.php"); 
session_start();
$display = 4;
if (isset($_GET['np'])) { // Already been determined.
	$num_pages = $_GET['np'];
} else { // Need to determine.
 	// Count the number of records
 	$query = "SELECT COUNT(*) FROM tbproduct";
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	$num_records = $row[0];
	// Calculate the number of pages.
	if ($num_records > $display) { // More than 1 page.
		$num_pages = ceil ($num_records/$display);	
	} else {
		$num_pages = 1;
		echo $num_pages;
	}
}
// Determine where in the database to start returning results.
if (isset($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<?php include("header.php");?>
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
	<link rel="stylesheet" href="css/button.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<!--redirect to previous page-->
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Header section -->
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/2.jpg">
		<div class="page-info">
			<h2>Games</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>Games</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- games section -->
	<section class="review-section">
		<div class="container">
			<?php
			$query = "SELECT idproduct,pname,price,photo,genre,console,descp FROM tbproduct LIMIT $start, $display";
			$result = mysqli_query ($dbc, $query); // Run the query.
			while ($row = mysqli_fetch_array($result)) {
			?>
			<div class="review-item">
				<div class="row">
					<div class="col-lg-4">
						<div class="review-pic">
							<?php echo '<img src="'.$row['photo'].'">';?>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="review-content text-box text-white">
							<div class="rating">
								<h5><i>PRICE</i><span>₹ </span> <?php echo $row['price'];?></h5>
							</div>
							<h3><?php echo $row['pname'];?></h3>
							<p><?php echo $row['descp']; ?></p>
							<a class="read-more" href = "buy.php?gameid=<?php echo $row['idproduct'];?>">
									GET IT NOW<img src="img/icons/double-arrow.png" alt="#"/>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="site-pagination">
				<?php
			if ($num_pages > 1) {
				// Determine what page the script is on.	
				$current_page = ($start/$display) + 1;
				
				// Make all the numbered pages.
				for ($i = 1; $i <= $num_pages; $i++) {
					if ($i != $current_page) {
						echo '<a href="admgames.php?s=' . (($display * ($i - 1))) . '&np=' . $num_pages .'">' . $i . '</a>';
					} else {
						echo '<a href"#" class="active">&nbsp'.$i ;
					}
				}
				
			
				echo '</p>';
				
			}
			?>
			</div>
		</div>
	</section>
	<!-- Review section end-->



	<!-- Footer section -->
	<?php include("footer.php"); ?>
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
</html>
