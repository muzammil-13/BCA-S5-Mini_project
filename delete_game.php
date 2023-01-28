<?php
  include("conn.php");
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
	$pid=
    $query = "DELETE FROM tbsale WHERE idproduct='$id' AND idclient=";
    $result = mysqli_query($dbc, $query);
    if($result) {
      header("Location: adm_games.php");
    } else {
      echo "Error in deleting the product.";
    }
  }
?>