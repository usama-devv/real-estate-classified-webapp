<?php
include("config.php");
$coid = $_GET['id'];
$sql = "DELETE FROM country WHERE coid = {$coid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Country Deleted</p>";
	header("Location:countryadd.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Country Not Deleted</p>";
	header("Location:countryadd.php?msg=$msg");
}
mysqli_close($con);
?>
