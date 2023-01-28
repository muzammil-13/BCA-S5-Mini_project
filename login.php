<?php include("conn.php"); 
session_start();
include('conn.php');
if(isset($_POST['loginbtn']))
{	
	$email=$_POST['email'];
    $p1=$_POST['password'];
    $sql = "SELECT * FROM user WHERE email='$email' AND pass='$p1'";
    $result = mysqli_query($dbc,$sql);
	if(mysqli_num_rows($result)==1)
	{	
		$row=mysqli_fetch_array($result);
		$_SESSION['username']=$row['name'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];
		$_SESSION['uid']=$row['idclient'];
		$_SESSION['loggedin']=true;
		if(isset($_SESSION['url']))
		{
			$uri=$_SESSION['url'];
			header("Location: $uri");//redirect to previous page
			exit;
		}	
		else{
			header("location: index.php");
		}
		}
	else
	{
	    echo "<script type='text/javascript'>alert('Invalid Login Credentials'); window.location='login.php'</script>";          
	}	
 }
if(isset($_POST['createacc']))
{
    $username=$_POST['username'];
    $p1=$_POST['password'];
	$email=$_POST['email'];//needs to do regstartion
    $sql = "INSERT INTO `user` (`name`,`email`,`pass`) values ('$username','$email','$p1')";
    if(mysqli_query($dbc,$sql))
	{
		$_SESSION['username']=$_POST['username'];
		$_SESSION['password']=$_POST['password'];			
		$_SESSION['loggedin']=true;
		$sql = "SELECT * FROM user WHERE name='$username' ";
    	$result = mysqli_query($dbc,$sql);
		$row=mysqli_fetch_array($result);
		$_SESSION['uid']=$row['idclient'];
		if(isset($_SESSION['url']))
		{
			header("Location: " . $_SESSION['url']);
			exit;
		}	
		else{
			header("location: index.php");
		}
	}
}
if(isset($_POST['admloginbtn']))
{	
	$email=$_POST['admemail'];
    $p1=$_POST['admpassword'];
    $sql = "SELECT * FROM adm WHERE email='$email' AND pass='$p1'";
    $result = mysqli_query($dbc,$sql);
	if(mysqli_num_rows($result)==1)
	{	
		$row=mysqli_fetch_array($result);
		$_SESSION['admloggedin']=true;
		header("location: admin.php");
	}
	else
	{
	    echo "<script type='text/javascript'>alert('Invalid Login Credentials'); window.location='login.php'</script>";          
	}	
 }
 
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Triple Forms Responsive Widget Template :: w3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Triple Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="css/login.css"  />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext"
	 rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<div class="main-bg">
		<!-- title -->
		<a href="index.php"><h1>login/regstraion</h1></a>
		<!-- //title -->
		<div class="sub-main-w3">
			<div class="image-style">

			</div>
			<!-- vertical tabs -->
			<div class="vertical-tab">
				<div id="section1" class="section-w3ls">
					<input type="radio" name="sections" id="option1" checked>
					<label for="option1" class="icon-left-w3pvt"><br><br><span class="fa fa-user-circle" aria-hidden="true"></span>Login</label>
					<article>
						<form action="#" method="post"  >
							<h3 class="legend">Login Here</h3><br><br><br>
							<div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="email" placeholder="Email" name="email" required />
							</div>
							<br>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Password" name="password" required />
								
							</div>
							<br><br>
							<button type="submit" name="loginbtn" class="btn submit">Login</button>
						</form>
					</article>
				</div>
				<div id="section2" class="section-w3ls">
					<input type="radio" name="sections" id="option2">
					<label for="option2" class="icon-left-w3pvt"><br><br><span class="fa fa-pencil-square" aria-hidden="true"></span>Register</label>
					<article>
						<form action="#" method="post">
							<h3 class="legend">Register Here</h3>
							<div class="input">
								<span class="fa fa-user-o" aria-hidden="true"></span>
								<input type="text" placeholder="Username" name="username" required />
							</div>
							<div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="email" placeholder="Email" name="email" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Password" name="password" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Confirm Password" name="password" required />
							</div>
							<button type="submit" class="btn submit" name="createacc">Register</button>
						</form>
					</article>
				</div>
			<div id="section3" class="section-w3ls">
				<input type="radio" name="sections" id="option3">
				<label for="option3" class="icon-left-w3pvt"><br><br><span class="fa fa-user-circle" aria-hidden="true"></span>AdminLogin</label>
				<article>
					<form action="#" method="post" >
						<h3 class="legend">Admin Login Here</h3><br><br>
						<div class="input">
							<span class="fa fa-envelope-o" aria-hidden="true"></span>
							<input type="email" placeholder="Email" name="admemail" required />
						</div>
						<br>
						<div class="input">
							<span class="fa fa-key" aria-hidden="true"></span>
							<input type="password" placeholder="Password" name="admpassword" required />
						</div>
						<br><br><br>
						<button type="submit" name="admloginbtn" class="btn submit">Login</button>
					</form>
				</article>
			</div>
	</div>
			<!-- //vertical tabs -->
			<div class="clear"></div>
		</div>
		
	</div>

</body>

</html>