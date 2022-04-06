<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","hello");
	if(!isset($_SESSION['email'])){
		header("location:login.php");
	}
#	$user=$_SESSION['email'];
#	$query="SELECT * FROM user WHERE email='$user'";
#	$query_run=mysqli_query($conn,$query);
#	$row=mysqli_fetch_assoc($query_run);
	
		if(isset($_GET['complet']))
		{		echo "hel";  
				$id = $_GET['complet'];
				echo $id;
				$query="SELECT * FROM request WHERE id='$id'";
				$query_run=mysqli_query($conn,$query);
				$row=mysqli_fetch_assoc($query_run);
				$name=$row['name'];
				$phonenumber=$row['phone_number'];
				$mail=$row['email'];
				$waterquantity=$row['water_quantity'];
				$address=$row['address'];
				mysqli_query($conn,"INSERT INTO history(name,phone_number,email,water_quantity,address) VALUES ('$name','$phonenumber','$mail','$waterquantity','$address');");
				mysqli_query($conn,"DELETE FROM request WHERE id='$id'");

				unset($id);
		}
	
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
		$sql = "SELECT * FROM request  ORDER BY id DESC;";
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
					<td>
					<!--	<a href="requested.php?complet=<?php echo $row['id']; ?>"
							name="comp">complet</a>-->
						<a href="requested.php?complet=<?php echo $row['id']; ?>" ><button name="comp" >complete</button></a>
					</td>
				</tr>

			<?php endwhile; ?>
		</table>
	
	
 	

</body>
</html>