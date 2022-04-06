<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","hello");
	if(!isset($_SESSION['email'])){
		header("location:login.php");
	}
	

	if(isset($_POST['submit']))
	{			
					
					$mail=$_SESSION['email'];

				#	$email=$_POST['email'];
					$feedback=$_POST['feedback'];
					
					$query="INSERT INTO feedback(email,feedback) VALUES ('$mail','$feedback')";
				
					$query_run=mysqli_query($conn,$query);
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("Thanks for feedback") </script>'; 
						
					}
					else{
						echo '<script type="text/javascript"> alert("failed") </script>'; 
					}
	}


?>	

<!DOCTYPE html>
<html>
<head>
	<title>Requesting page</title>
	<link rel="stylesheet" type="text/css" href="request_style1.css">
</head>
<body>
	<div class="main">
		<div>
			<h1 class="header">Give your feedback</h1>
		</div>
		<div >
		
			<form class="one" method="post">
				<label>Enter your feedback : </label>
				<textarea cols="30" rows="5" name="feedback"></textarea>
				<button name="submit">submit</button>
				<button><a href="homepage.php">back</a></button>
				
				

			</form>
			
		</div>
		
	</div>

</body>
</html>