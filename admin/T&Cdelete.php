<?php
include("config.php");
$id = $_GET['id'];

// view code//
$sql = "SELECT * FROM terms where id='$id'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
	

//end view code


$msg="";
$sql = "DELETE FROM terms WHERE id = {$id}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Terms and Conditions Deleted</p>";
	header("Location:T&Cview.php?msg=$msg");
}
else
{
	$msg="<p class='alert alert-warning'>Terms and Conditions not Deleted</p>";
		header("Location:T&Cview.php?msg=$msg");
}

mysqli_close($con);
?>
