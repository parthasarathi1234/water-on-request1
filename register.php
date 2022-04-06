<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","hello");
?>
<!DOCTYPE html>
<html>
<head>
	<title>register page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="main_menu">
		<div class="sub_one">
			<h1>WATER ON REQUEST</h1>
		</div>
		<div class="sub_two">
			<ul>
				<li><a href="homepage.php">home</a></li>
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
			<label>Full name : </label>&emsp;&emsp;&emsp;&ensp;
			<input type="text" name="fullname" class="input" placeholder="Full name" required><br><br>
			
			<label>Email : </label>&emsp;&emsp;&emsp;&ensp;&emsp;&ensp;&nbsp;
			<input type="email" name="email" class="input" placeholder="email" required><br><br>
			<label>Phone number : </label>&emsp;&ensp;
			<input type="tel" name="number" class="input" placeholder="phone number" required><br><br>
			
			<label>Password : </label>&emsp;&emsp;&emsp;&ensp;&nbsp;
			<input type="password" name="password" class="input" placeholder="password"  required><br><br>
			<label>Confirm Password : </label>
			<input type="password" name="cpassword" class="input" placeholder="confirmpassword" required><br><br>
			<input type="submit" name="submit_btn" id="sign_btn" value="Sign up"><br>
			<p>
				Already a member ?  <a href="login.php" class="sign_in">Sign in</a>
			</p>

		</form>
		<?php
			if(isset($_POST['submit_btn']))
			{
				$fullname=$_POST['fullname'];
				
				$email=$_POST['email'];
				$phone=$_POST['number'];
				
				$password=$_POST['password'];
				
				$cpassword=$_POST['cpassword'];

				if($password==$cpassword)
				{
					$query="SELECT * FROM user WHERE email='$email'"; #checking user name if their exits 
					$query_run=mysqli_query($conn,$query);

					if(mysqli_num_rows($query_run)>0)
					{
						echo '<script type="text/javascript"> alert("Gmail alreay exits") </script>';
					}
					else
					{
						$query="INSERT INTO user(fullname,phone_number,email,password) VALUES ('$fullname','$phone','$email','$password')";
						$query_run=mysqli_query($conn,$query);
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