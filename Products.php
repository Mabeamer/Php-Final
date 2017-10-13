<?php
	try{
		$conn = new mysqli("localhost:8889", "root", "root", "ecommerce_database");
	}catch(Exception $e){
		echo $e->getMessage();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link href="lib/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- create the nav bar for all sites  -->
	<div class="navbar">
		<ul class="nav">
			<li>
				<a ref="index.php">Homepage</a>
			</li>
			<li>
				<a href="Products.php">Products</a>
			</li>
			<li>
				<a href="Contact.php">Contact</a>
			</li>
		</ul>
	</div>
	<div class="container">
		<h1>Products</h1>
		<div class="product">
			<figure></figure>
			<table style="width:100%">
				<tr>
					<th>Product</th>
					<th>Description</th>
				</tr>
				<?php
				$id = $row["ProductId"];
				$sql = "SELECT distinct ProductName, ProductDesc, ProductPrice, ProductId, ProductImg FROM ProductTable";
				$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) {
				print "<tr><td>";
				// insert a row for the image here along with the figcaption
        		print '<a href="Product-detail.php?id='.$row["ProductId"];
        		print ' " > ';
        		print '<img src="'.$row["ProductImg"];
        		print '" alt="cover">'.$row["ProductName"];
        		print "</a> ";
        		print "</td><td>";
        		print $row["ProductDesc"]. " ";
  				print $row["ProductPrice"]." </br>";
  				print "</td></tr>";
    }
				?>
			</table>
		</div>
	</div>
	<div class="footer">
		<div class="navbar">
			<ul class="nav">
				<li>
					<a href="index.php">Homepage</a>
				</li>
				<li>
					<a href="Products.php">Products</a>
				</li>
				<li>
					<a href="Contact.php">Contact</a>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>