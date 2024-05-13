<?php
include("config.php");
$id = $_GET['id'];
$sql = "DELETE FROM type WHERE id = {$id}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Type Deleted</p>";
	header("Location:typeadd.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Type Not Deleted</p>";
	header("Location:Typeadd.php?msg=$msg");
}
mysqli_close($con);
?>
