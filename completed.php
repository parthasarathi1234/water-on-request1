<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","hello");
	if(!isset($_SESSION['email'])){
		header("location:login.php");
	}
	
?>
<?php
 		
 	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="homestyle1.css">
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
	<div class="main_menu">
		<div class="sub_one">
			<h1>COMPLETED REQUEST</h1>
		</div>
		<div class="sub_two">
			<ul>
				
				<a href="manager.php">back</a>
				
			</ul>
			
		</div>
		<div class="sub_three">

			<?php 
		$sql = "SELECT * FROM history  ORDER BY id DESC;";
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
			
		</div>
		
	</div>
	
 	

</body>
</html>