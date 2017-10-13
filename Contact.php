<?php
try{
	$conn = new mysqli("localhost:8889", "root", "root", "ecommerce_database");
	if(!empty($_POST)){
		$userInsert = "INSERT INTO `contactTable` (`contact_Id`, `fname`, `lname`, `phoneNumber`, `email`, `commentBox`) VALUES (
		NULL
		, '".$_POST['fname']."'
		, '".$_POST['lname']."'
		, '".$_POST['phone']."'
		, '".$_POST['email']."'
		, '".$_POST['comment']."'
		)";

		$result = $conn->query($userInsert);
		if($userInsert) {
			// echo 'success';
		} else {
			echo 'failure';
		}
	}
}catch(Exception $e){
	// if ($conn->connect_error) {
	//     echo "Connection failed: " . $conn->connect_error;
	// }
	// print($userInsert."</br> Saved");
	echo $e->getMessage();
}
	$sql = "SELECT distinct fname, lname, commentBox FROM contactTable";
?>
<html>
	<head>
		<title>Contact</title>
		<link rel="stylesheet" type="text/css" href="lib/styles.css">	
		<link rel="stylesheet" type="text/css" href="lib/slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css"/>
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
		<h1>Contact</h1>
		<div class="container">
			<div class="form container">
				<form class="contact" method="POST" action="#" id="contact">
			      <label>First Name</label>
			      <input type="text" name="fname" required>
			      <label>Last Name</label>
			      <input type="text" name="lname" required>
			      <label>Email</label>
			      <input type="text" name="email">
			      <label>Phone Number</label>
			      <input type="tel" name="phone">
			      <label>Leave a Comment!</label>
			      <textarea rows="4" cols="30" name="comment">
			      </textarea>
			      <input class="submit" type="submit" value="Submit">
			  	</form>
		  </div>
		  <div class="comments">
		  	<?php $result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {
				print $row["commentBox"];
			}
			?>
		  </div>
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
		<script
    src="http://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
    <script src="lib/validation.js"></script>
	<script src="lib/script.js" type="text/javascript"></script>
	</body>
</html>