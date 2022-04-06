<?php
	session_start();
	require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>register page</title>
	<link rel="stylesheet" type="text/css" href="prastyle.css">
</head>
<body>
	<div class="main_menu">
		<div class="sub_one">
			<h1>WATER ON REQUEST</h1>
		</div>
		<div class="sub_two">
			<ul>
				<li>home</li>
				<li>services</li>
				<li>About</li>
			</ul>
			
		</div>
		<div class="sub_three">
			
			
			<div>
				<img src="tanker.jpg">
			</div>
			<div class="login">
				
			<form method="post" class="myform">
			<h1 class="header"><b>Registration Form<b></h1>
			<label>Full name : </label><br>
			<input type="text" name="fullname" class="input" placeholder="Full name" required><br>
			<label>Username : </label><br>
			<input type="text" name="user" class="input" placeholder="Username" required><br>
			<label>Email : </label><br>
			<input type="email" name="email" class="input" placeholder="email" required><br>
			<label>Phone number : </label><br>
			<input type="text" name="number" class="input" placeholder="phone number" required><br>
			<label>Address : </label><br>
			<input type="text" name="address" class="input" placeholder="Address" required><br>
			<label>Password : </label><br>
			<input type="text" name="password" class="input" placeholder="password" required><br>
			<label>Confirm Password : </label><br>
			<input type="text" name="cpassword" class="input" placeholder="confirmpassword" required><br>
			<input type="submit" name="submit_btn" id="sign_btn" value="Sign up"><br>
			<p>
				Already a member ?<a href="login.php">Sign in</a>
			</p>

		</form>
		<?php
			if(isset($_POST['submit_btn']))
			{
				$fullname=$_POST['fullname'];
				$username=$_POST['user'];
				$email=$_POST['email'];
				$phone=$_POST['number'];
				$address=$_POST['address'];
				$password=$_POST['password'];
				
				$cpassword=$_POST['cpassword'];

				if($password==$cpassword)
				{
					$query="select * from water WHERE username='$username'"; #checking user name if their exits 
					$query_run=mysqli_query($con,$query);

					if(mysqli_num_rows($query_run)>0)
					{
						echo '<script type="text/javascript"> alert("Username alreay exits") </script>';
					}
					else
					{
						$query="insert into water values('','$fullname','$username','$email','$phone','$address','$password')";
						$query_run=mysqli_query($con,$query);
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("Registration successfull") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}
				}
				else
				{

					echo '<script type="text/javascript"> alert("password and confirm password does not match") </script>';
				}


			}
		?>
			</div>
			
		
			
		</div>
	</div>

</body>
</html>