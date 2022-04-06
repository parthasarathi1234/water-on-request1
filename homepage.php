<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","hello");
	if(!isset($_SESSION['email'])){
		header("location:login.php");
	}
	$user=$_SESSION['email'];
	$query="SELECT * FROM user WHERE email='$user'";
	$query_run=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($query_run);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link rel="stylesheet" type="text/css" href="homestyle1.css">
</head>
<body>
	<div class="main_menu">
		<div class="sub_one">
			<h1>WATER ON REQUEST</h1>
		</div>
		<div class="sub_two">
			<ul>
				<li><a href="feedback.php">feedback</a></li>
				<li>services</li>
				<li>About</li>
				<p class="user">welcom <?php echo  $row['fullname']; ?></p>
				
				
				<a href="request.php" class="reque">Request</a>
			
				<a href="login.php" class="log_out"><span>Log out</span></a>

			</ul>
			
		</div>
		<div class="sub_three">
			<div class="content">
			
			<p>➢ Our project is “WATER ON REQUEST” which makes the water availability easier.<br>➢ People in the municipal corporation get water
by requesting through online(website).<br>➢ People in areas of water shortage will request
for supply of water.<br>
➢ Reduce the time and cost of public and
municipal corporation  </p>
			</div>
			<div class="image">
			<img src="tanker2.jpg">
			</div>
		</div>
		
	</div>

</body>
</html>