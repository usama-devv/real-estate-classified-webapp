<?php
include("config.php");
$id = $_GET['id'];

// view code//
$sql = "SELECT * FROM faq where id='$id'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
	

//end view code


$msg="";
$sql = "DELETE FROM faq WHERE id = {$id}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>FAQ Deleted</p>";
	header("Location:faqview.php?msg=$msg");
}
else
{
	$msg="<p class='alert alert-warning'>FAQ not Deleted</p>";
		header("Location:faqview.php?msg=$msg");
}

mysqli_close($con);
?>
