<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
///code                             
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&family=Poppins:wght@300;400;500;600&display=swap"
			rel="stylesheet"
		/>
		<link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png" />
		<link rel="stylesheet" href="./style.css" />
		<title>Frequently Asked Questions</title>
		<style>
			.attribution {
				font-size: 11px;
				text-align: center;
			}
			.attribution a {
				color: hsl(228, 45%, 44%);
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="img">
				<img src="./images/illustration-woman-online-desktop.svg" alt="" />
			</div>

			<div class="questions">
				<h1>FAQ</h1>
				<?php 
          
          $query=mysqli_query($con,"SELECT * FROM faq");
          while($row=mysqli_fetch_array($query))
          {
        ?>
				<div>
					<h3 class="question">
						<?php echo $row['1'];?>
						<img src="./images/icon-arrow-down.svg" alt="" />
					</h3>
					<p class="answer">
						<?php echo $row['2'];?>
					</p>
				</div>
				<hr />
				<?php } ?>
				
			</div>
		</div>

		<script src="./index.js"></script>
	</body>
</html>
