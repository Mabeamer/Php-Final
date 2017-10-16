<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link href="lib/styles.css" rel="stylesheet" type="text/css">
	<link href="lib/slick/slick.css" rel="stylesheet" type="text/css">
	<link href="lib/slick/slick-theme.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- create the nav bar for all sites  -->
	<div class="navbar">
		<ul class="nav">
			<li>
				<a href="Contact.php">Contact</a>
			</li>
			<li>
				<a href="Products.php">Products</a>
			</li>
			<li>
				<a href="index.php">Homepage</a>
			</li>
			<li>
				<form action="Products.php" class="search" id="search" method="get" name="search">
					<input class="submit" style="margin-top:15px;" type="submit" value="search">
				</form>
			</li>
			<li><input name="search" required="" style="margin-top:15px;" type="text"> </li>
		</ul>
	</div>
	<div class="container homepagecontainer">
		<h1>Beamer Games</h1>
		<div class="slideshow"><img alt="slider" src="lib/images/slider/ac.jpg"> <img alt="slider" src="lib/images/slider/nier.png"> <img alt="slider" src="lib/images/slider/bf4.jpg"> <img alt="slider" src="lib/images/slider/pubg.png"></div>
	</div>
	<p class="disclaimer">Disclaimer: I do not own any of these images. This site is for training purposes only and is not ment to sell actual products.</p>
	<div class="footer">
		<div class="navbar">
			<div class="footer">
				<div class="navbar">
					<ul class="nav">
						<li>
							<a href="Contact.php">Contact</a>
						</li>
						<li>
							<a href="Products.php">Products</a>
						</li>
						<li>
							<a href="index.php">Homepage</a>
						</li>
						<li>
							<form action="Products.php" class="search" method="get" name="search">
								<input class="submit" style="margin-top:15px;" type="submit" value="search">
							</form>
						</li>
						<li><input name="search" required="" style="margin-top:15px;" type="text"> </li>
					</ul>
				</div>
			</div>
		</div>
		<script src="//code.jquery.com/jquery-1.11.0.min.js" type="text/javascript">
		</script> 
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js" type="text/javascript">
		</script> 
		<script src="lib/slick/slick.min.js" type="text/javascript">
		</script> 
		<script src="lib/script.js" type="text/javascript">
		</script> 
		<script src="lib/slider.js" type="text/javascript">
		</script> 
	</div>
</body>
</html>