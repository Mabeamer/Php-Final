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
					<input class="submit" style="margin-top:15px;" type="submit" value="Search">
				</form>
			</li>
			<li><input name="search" required="" style="margin-top:15px;" type="text"> </li>
		</ul>
	</div>
	<div class="container">
		<h1>Products</h1>
		<div class="product">
			<figure></figure>
			<table style="width:100%">
				<tr>
					<th class="label">Product</th>
					<th class="label">Description</th>
				</tr><?php
				                // GET WHAT USER SEARCHED FOR
				                $unsafe_variable = "";
				                if(array_key_exists ("search" , $_GET)){
				                    $unsafe_variable = $_GET["search"];
				            }
				                // CREATE SQL STATEMENT WITH A QUESTION WHERE SEARCH CRITERIA WILL GO
				                $stmt = $conn->prepare("SELECT distinct ProductName, ProductDesc, ProductPrice, ProductId, ProductImg FROM ProductTable WHERE ProductName LIKE concat('%',?,'%')");
				                // ? GETS ASSIGNED THE VALUE THE USER TYPED IN
				                $stmt->bind_param("s", $unsafe_variable);
				                // EXECUTE SQL 
				                $stmt->execute();
				                // PUT RESULTS INTO VARIABLE
				                $result = $stmt->get_result();
				                // LOOP THROUGH AND PRINT RESULT/RESULTS
				                    while($row = $result->fetch_assoc()) {
				                print "<tr><td class = 'itemInfo'>";
				                // insert a row for the image here along with the figcaption
				                print '<a href="Product-detail.php?id='.$row["ProductId"];
				                print ' " > ';
				                print '<img class = "gameImg" src="'.$row["ProductImg"];
				                print '" alt="cover">'.$row["ProductName"];
				                print "</a> ";
				                print "</td><td class='gameDesc'>";
				                print "<div class = 'productDesc'>";
				                print $row["ProductDesc"];
				                print "</div>";
				                print "<button onClick='addToCart(" . $row['ProductId'] . ")' class = 'cartAdd'>Add to cart $" . $row["ProductPrice"]."</button>";
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
						<input class="submit" style="margin-top:15px;" type="submit" value="Search">
					</form>
				</li>
				<li><input name="search" required="" style="margin-top:15px;" type="text"> </li>
			</ul>
		</div>
	</div>
</body>
</html>