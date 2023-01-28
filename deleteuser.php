<?php
include("conn.php");
// Check if the form has been submitted
if (isset($_POST['userid'])) {
  // Get the user ID from the form
  $idclient = $_POST['userid'];

  // Delete the row from the users table
  $query = "DELETE FROM user WHERE idclient = '$idclient'";
  mysqli_query($dbc, $query);
}
header('Location: view.php');
exit;
?>