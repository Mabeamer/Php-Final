<?php
	try{
		$conn = new mysqli("localhost:8889", "root", "root", "ecommerce_database");
	}catch(Exception $e){
		echo $e->getMessage();
	}
	$id = $_GET['id'];

	$sql = "SELECT distinct ProductName, ProductDesc, ProductPrice, ProductImg FROM ProductTable WHERE ProductId = $id";

?>
<html>
	<head>
		<title>Product Detail</title>
		<link rel="stylesheet" type="text/css" href="lib/styles.css">	
	</head>
	<body>
		<!-- create the nav bar for all sites  -->
		<div class="navbar">
			<ul class="nav">
				<li><a href="index.php">Homepage</a></li>
				<li><a href="Products.php">Products</a></li>
				<li><a href="Contact.php">Contact</a></li>
			</ul>
		</div>
		<div class="container">
			<h1>Product Detail</h1>
			<?php
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()) {
					print '<div class="productName">';
					print $row["ProductName"];
					print '</div>';
					print '<div class="productImg">';
	        		print '<img src="'.$row["ProductImg"];
	        		print '" alt="cover">';
	        		print '</div>';
	        		print '<div class="productDesc">';
					print $row["ProductDesc"];
					print '</div>';
					print '<div class="productPrice">';
					print $row["ProductPrice"];
					print '</div>';
				}
			?>
			<button>Add to cart</button>
		</div>

		<div class="footer">
			<div class="navbar">
				<ul class="nav">
					<li><a href="index.php">Homepage</a></li>
					<li><a href="Products.php">Products</a></li>
					<li><a href="Contact.php">Contact</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>