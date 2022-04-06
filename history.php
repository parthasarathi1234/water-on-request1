<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","se");
	if(!isset($_SESSION['email'])){
		header("location:login.php");
	}
#	$user=$_SESSION['email'];
#	$query="SELECT * FROM user WHERE email='$user'";
#	$query_run=mysqli_query($conn,$query);
#	$row=mysqli_fetch_assoc($query_run);
	
		
?>
<?php
 		
 	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
	
	
 	

</body>
</html>