<?php include("conn.php"); 
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    <header class="header-section">
		<div class="header-warp">
			
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="index.php" class="site-logo">
					<img src="./img/logo.png" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<?php  
					if(isset($_SESSION['loggedin'])&&($_SESSION['loggedin']==true))
					{
						?>
						<div class="user-panel">
							<?php echo "<a>".$_SESSION['username']."&nbsp&nbsp&nbsp</a>";
							?>
						<a href="logout.php">Logout</a>
					</div>

					<?php
					}
					else
					{
					?>
					<div class="user-panel">
						<a href="login.php">Login</a> 
					</div>
					<?php
					}
					?>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="index.php">Home</a></li>
						<li><a href="admgames.php">Games</a></li>
						<li><a href="library.php">Library</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
    </body>
</html>