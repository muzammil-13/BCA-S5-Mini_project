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

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<?php include("header.php"); ?>	
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg">
		<div class="page-info">
			<h2>Games</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a>  /
				<span>Games</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->




	<!-- Games section -->
	<section class="games-section">
		<div class="container">
			<!--<ul class="game-filter">
				<li><a href="">A</a></li>
				<li><a href="">B</a></li>
				<li><a href="">C</a></li>
				<li><a href="">D</a></li>
				<li><a href="">E</a></li>
				<li><a href="">F</a></li>
				<li><a href="">G</a></li>
				<li><a href="">H</a></li>
				<li><a href="">I</a></li>
				<li><a href="">J</a></li>
				<li><a href="">K</a></li>
				<li><a href="">L</a></li>
				<li><a href="">M</a></li>
				<li><a href="">N</a></li>
				<li><a href="">O</a></li>
				<li><a href="">P</a></li>
				<li><a href="">Q</a></li>
				<li><a href="">R</a></li>
				<li><a href="">S</a></li>
				<li><a href="">T</a></li>
				<li><a href="">U</a></li>
				<li><a href="">V</a></li>
				<li><a href="">W</a></li>
				<li><a href="">X</a></li>
				<li><a href="">Y</a></li>
				<li><a href="">Z</a></li>
			</ul>
			if ever want to add sorting
			
		-->
			<div class="row">
				<section style="background-color :rgb(red, green, blue) ;" >
					<div class="container py-5">
					  <div class="row justify-content-center mb-3">
						<div class="col-md-12 col-xl-10">
						  <div class="card shadow-0 border rounded-3">
							<?php
							$query = "SELECT idproduct,pname,price,photo,genre,console,descp FROM tbproduct LIMIT $start, $display";
							$result = mysqli_query ($dbc, $query); // Run the query.
							while ($row = mysqli_fetch_array($result)) {
							?>
							<div class="card-body" style="background-color: rgba(80, 60, 110, 0.9);">
							  <div class="row">
								<div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
								  <div class="bg-image hover-zoom ripple rounded ripple-surface">
									<?php echo '<img src="'.$row['photo'].'" style="width: 100%;height: 100%;">';?>
									<a href="#!">
									  <div class="hover-overlay">
										<div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
									  </div>
									</a>
								  </div>
								</div>
								<div class="col-md-6 col-lg-6 col-xl-6">
								  <h5 style="color:hsl(282, 37%, 88%); font-size: 30px;"><?php echo $row['pname'];?></h5>
								  <div class="mt-1 mb-0 text-muted small">
									<span><?php echo $row['genre'];?></span>
									<span class="text-primary"> • </span>
									<span><?php echo $row['console'];?></span>
									<!--<span class="text-primary"> • </span>
									<span>teamplay<br /></span>
									if ever needs to add game genre
								    -->
								  </div> 
								  
								  <br>
								  <p  style="color:hsl(282, 37%, 88%);">
									<?php echo $row['descp']; ?>
								  </p>
								</div>
								<div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
								  <div class="d-flex flex-row align-items-center mb-1">
									<h4 class="mb-1 me-1" style="color:hsl(282, 37%, 88%);"><?php echo "Rs ".$row['price'];?></h4>
									<br><br>
								  </div>
								  <div class="d-flex flex-column mt-4">
									
								  <button  class="shadow__btn" onclick="window.location.href = 'buy.php?gameid=<?php echo $row['idproduct'];?>'">
									<span></span><span></span><span></span><span></span>
									get it now
								   </button>
								  </div>
								</div>
							  </div>
							</div><?php } ?>
						  </div>
						</div>
					  </div>
					</div>
				  </section>
			</div>
			<style>
				a.num {
					color: #fff;
					margin: 0 10px;
					font-weight: 500;
					cursor: pointer;
				}
				a.num:hover {
					color: #fff; /* Keep the color the same when hovered over */
					text-decoration: none; /* remove underline*/
				}
			</style>
			<?php
			if ($num_pages > 1) {
	
				echo '<br /><p align="center">';
				// Determine what page the script is on.	
				$current_page = ($start/$display) + 1;
				
				// If it's not the first page, make a First button and a Previous button.
				if ($current_page != 1) {
					echo '<a class="num" href="games.php?s=0&np=' . $num_pages  .'">First</a> ';
					echo '<a class="num" href="games.php?s=' . ($start - $display) . '&np=' . $num_pages . '">Previous</a> ';
				}
				
				// Make all the numbered pages.
				for ($i = 1; $i <= $num_pages; $i++) {
					if ($i != $current_page) {
						echo '<a class="num" href="games.php?s=' . (($display * ($i - 1))) . '&np=' . $num_pages .'">' . $i . '</a>';
					} else {
						echo '&nbsp'.$i .'&nbsp';
					}
				}
				
				// If it's not the last page, make a Last button and a Next button.
				if ($current_page != $num_pages) {
					
					echo '<a class="num" href="games.php?s=' . ($start + $display) . '&np=' . $num_pages .'">Next</a> ';
					echo '<a class="num" href="games.php?s=' . (($num_pages-1) * $display) . '&np=' . $num_pages . '">Last</a>';
			
				}
				
				echo '</p>';
				
			}
			?>
		</div>
	</section>
	<!-- Games end-->


	


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
