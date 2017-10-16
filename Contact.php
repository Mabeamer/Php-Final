<?php
try{
    $conn = new mysqli("localhost:8889", "root", "root", "ecommerce_database");
    if(!empty($_POST)){
        $userInsert = "INSERT INTO `contactTable` ( `fname`, `lname`, `phoneNumber`, `email`, `commentBox`) VALUES (
        ?
        , ?
        , ?
        , ?
        , ?
        )";
        $stmt = $conn->prepare($userInsert);
        $stmt->bind_param('sssss', $_POST["fname"], $_POST["lname"], $_POST["phone"], $_POST["email"], $_POST["comment"]);
        $stmt->execute();
        //print "here $userInsert";
    
        //print_r($stmt);



        //? represents a placeholder for where user input could damage database
        
        // , lname = ?, phoneNumber = ?, commentBox = ?"
        //use bind param to fill the placeholder ------ 's' for string 'i' for integer, etc.
        // $stmt->bind_param('s', $_POST["fname"]);
        // $_POST["fname"], $_POST["lname"], $_POST["phoneNumber"], $_POST["commentBox"])
        //call execute function to run the query after placeholders are filled
        // $stmt->execute();



    }
}catch(Exception $e){
    // if ($conn->connect_error) {
    //     echo "Connection failed: " . $conn->connect_error;
    // }
    print($userInsert."</br> Saved");
    echo $e->getMessage();
}
    $sql = "SELECT fname, lname, commentBox FROM contactTable";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<link href="lib/styles.css" rel="stylesheet" type="text/css">
	<link href="lib/slick/slick.css" rel="stylesheet" type="text/css">
	<link href="lib/slick/slick-theme.css" rel="stylesheet" type="text/css">
	<script language="javascript">
	$("#contact").validate();
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
	<h1>Contact</h1>
	<div class="container">
		<div class="form container">
			<form action="Contact.php" class="contact" id="contact" method="post" name="contact">
				<label>First Name</label> <input name="fname" required="" type="text"> <label>Last Name</label> <input name="lname" required="" type="text"> <label>Email</label> <input name="email" type="text"> <label>Phone Number</label> <input name="phone" type="tel"> <label>Leave a Comment!</label> 
				<textarea cols="30" name="comment" rows="4"></textarea> <input class="submit" type="submit" value="Submit">
			</form>
		</div>
		<div class="comments">
			<?php $result = $conn->query($sql);
			            while($row = $result->fetch_assoc()) {
			            	print "<div class = 'comment'>";
			                print $row["fname"] .":  ";
			                print $row["commentBox"];
			                print "</div>";
			            }
			            ?>
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
		<script src="http://code.jquery.com/jquery-3.2.1.js">
		</script> 
		<script src="lib/validation.js">
		</script> 
		<script src="lib/script.js" type="text/javascript">
		</script> 
	</div>
</body>
</html>