<?php
	$search_input=$_POST["search"];
		try{
		$conn = new mysqli("localhost:8889", "root", "root", "ecommerce_database");
	}catch(Exception $e){
		echo $e->getMessage();
	}
?>
<html>
	<head>
		<title>Search</title>
		<link rel="stylesheet" type="text/css" href="lib/styles.css">	
	</head>
	<body>
		<!-- create the nav bar for all sites  -->
		<div class="container">
			<h1>Search</h1>
			<form class="search" method="POST" action="#" id="search">
				<input type="text" name="search" required>
				<input class="submit" type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>