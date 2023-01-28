<!DOCTYPE html>
<html lang="zxx">
<?php include("conn.php");
session_start();
if(isset($_SESSION['admloggedin'])&&($_SESSION['admloggedin']==true))
{
 ?>
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
	<section  class="page-top-section set-bg" data-setbg="img/page-top-bg/3.jpg">
		<div class="page-info">
			<h2>Sales</h2>
			<div class="site-breadcrumb">
				<a href="">admin</a>  /
				<span>Sales</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->


	<!-- Blog page -->
	<section class="blog-page">
  <!--for demo wrap-->
  <style>
    h1 {
     font-size: 30px;
     color: #fff;
     text-transform: uppercase;
     font-weight: 300;
     text-align: center;
     margin-bottom: 15px;
    }
    table {
        width: 100%;
        table-layout: fixed;
        margin-top: auto;
    }
    .tbl-header {
         background-color: rgba(255, 255, 255, 0.3);
    }
    .tbl-content {
        height: 300px;
        overflow-x: auto;
        margin-top: 0px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    th {
        padding: 20px 15px;
        text-align: left;
        font-weight: 500;
        font-size: 12px;
        color: #fff;
        text-transform: uppercase;
    }
    td {
        padding: 15px;
        text-align: left;
        vertical-align: middle;
        font-weight: 300;
        font-size: 12px;
        color: #fff;
        border-bottom: solid 1px rgba(255, 255, 255, 0.1);
    }
    ::-webkit-scrollbar {
        width: 6px; 
    }
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }
    ::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }
  .btn {
  background-color: transparent;
  position: relative;
  border: none;
}

.btn::after {
  content: 'delete';
  position: absolute;
  top: -130%;
  left: 50%;
  transform: translateX(-50%);
  width: fit-content;
  height: fit-content;
  background-color: rgb(168, 7, 7);
  padding: 4px 8px;
  border-radius: 5px;
  transition: .2s linear;
  transition-delay: .2s;
  color: white;
  text-transform: uppercase;
  font-size: 12px;
  opacity: 0;
  visibility: hidden;
}

.icon {
  transform: scale(1.2);
  transition: .2s linear;
}

.btn:hover > .icon {
  transform: scale(1.5);
}

.btn:hover > .icon path {
  fill: rgb(168, 7, 7);
}

.btn:hover::after {
  visibility: visible;
  opacity: 1;
  top: -160%;
}


  </style>
  <h1>Sales list</h1>
  <div class="tbl-header"  style="margin: 50px;margin-top: 0%;margin-bottom: 0%;">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>SI</th>
          <th>sales ID</th>
          <th>USER ID</th>
          <th>Username</th>
          <th>product id</th>
          <th>Product name</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content"  style="margin: 50px;margin-top: 0%;margin-bottom: 0%;">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php
            $query = "SELECT * FROM tbsale";
            $result = mysqli_query($dbc, $query);
            $i=1;
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $i . "</td>";
              $i++;
              echo "<td>" . $row['idsale'] . "</td>";
              echo "<td>" . $row['idclient'] . "</td>";
              $id=$row['idclient'];
              $sql="SELECT * FROM user WHERE idclient= '$id'";
              $res = mysqli_query($dbc, $sql);
              $r = mysqli_fetch_assoc($res);
              echo "<td>" . $r['name'] . "</td>";
              $pid=$row['idproduct'];
              $sql="SELECT * FROM tbproduct WHERE idproduct='$pid'";
              $res = mysqli_query($dbc, $sql);
              $r = mysqli_fetch_assoc($res);
              echo "<td>" . $r['idproduct'] . "</td>";
              echo "<td>" . $r['pname'] . "</td>";
              ?>     
          <td>
          <button class="btn" data-id="<?php echo $row['idclient']; ?>" id="deleteBtn">
              <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                <path transform="translate(-2.5 -1.25)" d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z" id="Fill"></path>
              </svg>
            </button>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Delete a row from the users table
  $('#deleteBtn').click(function() {
    var userid = $(this).data('id');
    if (confirm('Are you sure you want to delete this row?')) {
    $.ajax({
      url: 'deleteuser.php',
      type: 'post',
      data: {userid: userid},
      success: function(response) {
        $(this).closest('tr').remove();
      }
    });
  }
  });
});
</script>
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
<?php  }
    else
    {
        $_SESSION['url']=$_SERVER['REQUEST_URI'];
        echo "<script>alert('Please login'); window.location.href='login.php';</script>";
    }
?>
