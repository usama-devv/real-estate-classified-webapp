<?php
session_start();
require("config.php"); 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
///code
$error="";
$msg="";
if(isset($_POST['insert']))
{
	$country=$_POST['country'];
	
	if(!empty($country)){
		$sql="insert into country (coname) values('$country')";
		$result=mysqli_query($con,$sql);
		if($result)
			{
				$msg="<p class='alert alert-success'>Country Inserted Successfully</p>";
						
			}
			else
			{
				$error="<p class='alert alert-warning'>* Country Not Inserted</p>";
			}
	}
	else{
		$error = "<p class='alert alert-warning'>* Fill all the Fields</p>";
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Real Estate - Country</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->

		
			<!-- Header -->
			<?php include("header.php");?>	
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Country</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Country</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
				<!-- Country add section --> 
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h1 class="card-title">Add Country</h1>
									<?php echo $error;?>
									<?php echo $msg;?>
									<?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
								</div>
								<form method="post" id="insert product" enctype="multipart/form-data">
									<div class="card-body">
											<div class="row">
												<div class="col-xl-6">
													<h5 class="card-title">Country Details</h5>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label">Country Name</label>
														<div class="col-lg-9">
															<input type="text" class="form-control" name="country">
														</div>
													</div>
												</div>
											</div>
											<div class="text-left">
												<input type="submit" class="btn btn-primary"  value="Submit" name="insert" style="margin-left:200px;">
											</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				<!----End country add section  --->
				
				<!----view country  --->
				<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Country List</h4>
									
								</div>
								<div class="card-body">

									<table id="basic-datatable " class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Country</th>
													<th>Actions</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
											<?php
													
												$query=mysqli_query($con,"select * from country");
												$cnt=1;
												while($row=mysqli_fetch_row($query))
													{
											?>
                                                <tr>
                                                    
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['1']; ?></td>
													<td><a href="countryedit.php?id=<?php echo $row['0']; ?>"><button class="btn btn-info">Edit</button></a>
                                                    <a href="countrydelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                                                </tr>
                                                <?php $cnt=$cnt+1; } ?>

                                            </tbody>
                                        </table>
								</div>
							</div>
						</div>
					</div>
				<!-- view country -->
				</div>			
			</div>
			<!-- /Main Wrapper -->
			<!---
			
			<label class="col-lg-3 col-form-label">Country Name</label>
													<div class="col-lg-9">	
														<select class="form-control">
															<option>Select</option>
															<option>Option 1</option>
															<option>Option 2</option>
															<option>Option 3</option>
															<option>Option 4</option>
															<option>Option 5</option>
														</select>
													</div>
			
			---->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.select.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatables/buttons.flash.min.js"></script>
		<script src="assets/plugins/datatables/buttons.print.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>
</html>
