<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","hello");


	
?>
<?php
	
	
		if(isset($_GET['complet']))
		{		  
				$id = $_GET['complet'];
			
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

				
		}
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
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
			<h1>WATER ON REQUEST</h1>
		</div>
		<div class="sub_two">
			<ul>
				
			
				<a href="completed.php" class="reque">history</a>
			
				<a href="logout.php" class="log_out"><span>Log out</span></a>
			</ul>
			
		</div>
		<div class="sub_three">

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
						<a href="?complet=<?php echo $row['id']; ?>" ><button name="comp" >complete</button></a>
					</td>
				</tr>

			<?php endwhile; ?>
		</table>
			
		</div>
		
	</div>

</body>
</html>