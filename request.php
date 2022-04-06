<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","hello");
	if(!isset($_SESSION['email'])){
		header("location:login.php");
	}
$user=$_SESSION['email'];
	if(isset($_POST['parthu']))
	{			
					$name=$_POST['name'];
					$phonenumber=$_POST['number'];
					$mail=$user;
				#	$email=$_POST['email'];
					$waterquantity=$_POST['water'];
					$address=$_POST['address'];
					$query="INSERT INTO request(name,phone_number,email,water_quantity,address) VALUES ('$name','$phonenumber','$mail','$waterquantity','$address')";
				
					$query_run=mysqli_query($conn,$query);
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("Request successfull") </script>'; 
						
					}
					else{
						echo '<script type="text/javascript"> alert("Request failed") </script>'; 
					}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Requesting page</title>
	<link rel="stylesheet" type="text/css" href="request_style1.css">

	<style>
		table,th,td{
		border: 1px solid black;
		}
		table {
  border-collapse: collapse;
  width: 100%;
}

th {
  height: 70px;
}
	</style>
</head>
<body>
	<div class="main">
		<div>
			<h1 class="header">Water Requesting</h1>
		</div>
		<div >
		
			<form class="one" method="post">
				<label>Name : </label><br>
				<input type="text" name="name" required><br>
				<label>Phone number : </label><br>
				<input type="tel" name="number" required><br>
			
				<label>Water quantity : </label><br>
				<input type="text" name="water" required><br>
				<label>Address : </label><br>
				<textarea cols="20" rows="4" name="address"></textarea>
			<!--	<input type="submit" name="parthu" id="sub_btn" value="Submit">-->
				<button name="parthu">submit</button>
				<button><a href="homepage.php">back</a></button>
				

			</form>
			
		</div>
		<div>
			<h2>previous requests</h2>
			<div class="sub_three">

			<?php 
		$sql = "SELECT * FROM request  WHERE email='$user' ORDER BY id DESC;";
		$result = mysqli_query($conn,$sql);
		?>
	
	
		<table>
			<tr>
				<th>Name</th>
				<th>email</th>
				<th>phone number</th>
				<th>water quantity</th>
				<th>address</th>
			</tr>
			<?php while($row= $result->fetch_assoc()): ?>
			<tr>
					<td><?php  echo $row['name']; ?></td>
					<td><?php  echo $row['email']; ?></td>
					<td><?php  echo $row['phone_number']; ?></td>
					<td><?php  echo $row['water_quantity']; ?></td>
					<td><?php  echo $row['address']; ?></td>
					
				</tr>

			<?php endwhile; ?>
		</table>
			<?php 
		$sql = "SELECT * FROM history  WHERE email='$user' ORDER BY id DESC;";
		$result = mysqli_query($conn,$sql);
		?>
	
	
		<table>
			<h2>completed request information </h2>
			<tr>
				<th>Name</th>
				<th>email</th>
				<th>phone number</th>
				<th>water quantity</th>
				<th>address</th>
			</tr>
			
			<?php while($row= $result->fetch_assoc()): ?>
			<tr>
					<td><?php  echo $row['name']; ?></td>
					<td><?php  echo $row['email']; ?></td>
					<td><?php  echo $row['phone_number']; ?></td>
					<td><?php  echo $row['water_quantity']; ?></td>
					<td><?php  echo $row['address']; ?></td>
					
				</tr>

			<?php endwhile; ?>
		</table>
			
		</div>

		</div>
		
	</div>

</body>
</html>