<?php
    try{
        $conn = new mysqli("localhost:8889", "root", "root", "ecommerce_database");
    }catch(Exception $e){
        echo $e->getMessage();
    }
    $id = $_GET['id'];

    $sql = "SELECT distinct ProductName, ProductDesc, ProductPrice, ProductImg, ProductId FROM ProductTable WHERE ProductId = $id";
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Detail</title>
	<link href="lib/styles.css" rel="stylesheet" type="text/css">
	<script src="lib/script.js" type="text/javascript">
	</script>
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
	<div class="container">
		<h1>Product Detail</h1><?php
		                $result = $conn->query($sql);
		                while($row = $result->fetch_assoc()) {
		                    print '<div class="productName">';
		                    print $row["ProductName"];
		                    print '</div>';
		                    print '<table class = "productTable">';
		                    print '<tr><td>';
		                    print '<div class="productImg">';
		                    print '<img src="'.$row["ProductImg"];
		                    print '" alt="cover">';
		                    print '</div>';
		                    print '</td>';
		                    print '<td>';
		                    print '<div class="productDesc">';
		                    print $row["ProductDesc"];
		                    print '</div>';
		                    print '<div class="productPrice">';
		                    print "<button onClick='addToCart(" . $row['ProductId'] . ")' class = 'cartAdd'>Add to cart $" . $row["ProductPrice"]."</button>";
		                    print '</div>';
		                    print '</td>';
		                    print '</table>';
		                }
		            ?>
	</div>
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
</body>
</html>