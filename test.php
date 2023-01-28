<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="content">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
	</div>
	<div id="display-image">
	<?php
        include("conn.php"); 
		$query = " select * from image ";
		$result = mysqli_query($dbc, $query);

		while ($data = mysqli_fetch_assoc($result)) {
			echo '<img src="'.$data['filename'].'">';
		}
	?>
	</div>
</body>

</html>
<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
	if(!empty($_FILES['uploadfile'])){
		$path = "images/";
		$path=$path. basename($_FILES['uploadfile']['name']);
			if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path))
			{
				echo"The file ". basename($_FILES['uploadfile']['name']). " has been uploaded";
			}
	
			else{
				echo "There was an error uploading the file, please try again!";
			}
	}

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "images/" . $filename;
	// Get all the submitted data from the form
	$sql = "INSERT INTO image (filename) VALUES ('$folder')";

	// Execute query
	mysqli_query($dbc, $sql);

	// Now let's move the uploaded image into the folder: image
	
}
?>
